<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\ViewHelperFunctions as VHF;

class PagesController extends Controller
{
    /*
    |-----------------------------
    | Preparing Data Model
    |-----------------------------
    */

    static function prepareDataModel(Array $dataNames){
        $dataModel = [];
        if (in_array('allCategories', $dataNames) || in_array('defaultData', $dataNames)){
            $dataModel['allCategories'] = DB::select('
                SELECT * FROM categories
                ;
            ');
        }

        if (in_array('artistName', $dataNames) || in_array('defaultData', $dataNames)){
            $dataModel['artistName'] = DB::select('
                SELECT value FROM admin_data
                WHERE name = "artist-name"
                ;')[0]->value;
        }

        return $dataModel;
    }

    /*
    |-----------------------------
    | GET
    |-----------------------------
    */

    public function getHome(Request $request){
        $dataModel = $this::prepareDataModel(['defaultData']);
        $dataModel['ami'] = 'home';
        $dataModel['homepageItem'] = $this->getHomepageItem();
        return view('pages/home', $dataModel);
    }


    public function getCategory(Request $request, $name, $page, $order){
        $dataModel = $this::prepareDataModel(['defaultData']);
        $dataModel['ami'] = $name;

        $catID = VHF::htmlNameToCatID($name);
        $dataModel['catName'] = $name;
        $dataModel['catPage'] = $page;
        $dataModel['catPageCount'] = $this->getCatPageCount($catID);
        $dataModel['catCurrOrder'] = $order;
        $dataModel['catSelection'] = $this->getCatSelection($catID, (int)$page, $order);

        return view('pages/category', $dataModel);
    }

    public function getFeature(Request $request, $itemID){
        $dataModel = $this::prepareDataModel(['defaultData']);
        $dataModel['ami'] = '';
        $dataModel['featureItem'] = $this->getItem($itemID);

        return view('pages/feature', $dataModel);
    }

    public function getAdmin(Request $request){
        $dataModel = $this::prepareDataModel(['defaultData']);
        $dataModel['ami'] = 'admin';
        return view('pages/admin', $dataModel);
    }

    public function getUploadItem(Request $request){
        $dataModel = $this::prepareDataModel(['defaultData']);
        $dataModel['ami'] = 'admin';
        return view('pages/upload-item', $dataModel);
    }

    public function getEditItem(Request $request, $itemID){
        $dataModel = $this::prepareDataModel(['defaultData']);
        $dataModel['ami'] = 'admin';
        $dataModel['editingItemID'] = $itemID;
        if ($itemID != 0) {
            $dataModel['editingItem'] = $this->getItem($itemID);
            $dataModel['editingItemsCategories'] = $this->getItemsCategories($itemID);
        }
        return view('pages/edit-item', $dataModel);
    }

    public function getSetHomepageItem(Request $request){
        $dataModel = $this::prepareDataModel(['defaultData']);
        $dataModel['ami'] = 'admin';
        if ((int)DB::select('SELECT value FROM admin_data WHERE name = "homepage-itemID";')[0]->value === 0){
            $dataModel['homepageIsRandom'] = true;
        }else{
            $dataModel['homepageIsRandom'] = false;
            $dataModel['homepageItem'] = $this->getHomepageItem();
        }
        return view('pages/set-homepage-item', $dataModel);
    }

    /*
    |-----------------------------
    | POST
    |-----------------------------
    */



    public function postUploadItem(Request $request){
        $dataModel = $this::prepareDataModel(['defaultData']);
        $dataModel['ami'] = 'admin';

        // validate input
        $this->validate($request, [
            'file' => 'required|image',
            'title' => 'required|max:255',
            'info' => 'max:255',
        ],
        [],
        [
            'file' => 'File',
            'title' => 'Title',
            'info' => 'Info'
        ]);

        // array of all current items
        $rows = DB::select('SELECT fileName FROM items;');
        $currentItemNames = [];
        foreach($rows as $row){
            $currentItemNames[] = $row->fileName;
        }

        // Determine new name
        $file = $request->file('file');
        $newExt = $file->getClientOriginalExtension();
        do {
            $newName = str_random(40). '.' . $newExt;
        } while (in_array($newName, $currentItemNames));

        // Move file (renamed)
        $file = $file->move(public_path() . '\items', $newName);

        // add record to items table
        DB::insert('INSERT INTO items (title, info, fileName) VALUES (?, ?, ?);',
            [
                $request->input('title'),
                $request->input('info'),
                $newName
            ]);


        // add records to link_items_categories table
        $itemID = DB::select('SELECT MAX(itemID) AS itemID FROM items;')[0]->itemID;
        $this->insertLinks($itemID, $request);

        return redirect('/upload-item')->with('success', 'File uploaded successfully.');
    }

    public function postSetHomepageItem(Request $request){
//        var_dump($request->input());

        // validate input
        $this->validate($request, [
            'homepage-itemID' => 'required'
        ],
        [],
        [
            'homepage-itemID' => 'Randomize'
        ]);

        $this->updateHomepageItemID($request->input('homepage-itemID'));

        return redirect('/set-homepage-item')->with('success', 'Homepage feature updated successfully.');
    }

    public function postEditItem(Request $request){
//        var_dump($request->input());
        if ($request->has('update-or-delete') && $request->input('update-or-delete') == 'delete'){
            return $this->deleteItem($request);
        }else{
            return $this->updateItem($request);
        }
    }

    public function updateItem(Request $request){
        $dataModel = $this::prepareDataModel(['defaultData']);
        $dataModel['ami'] = 'admin';

        // validate input
        $this->validate($request, [
            'title' => 'required|max:255',
            'info' => 'max:255',
        ],
        [],
        [
            'title' => 'Title',
            'info' => 'Info'
        ]);

        //update items table
        DB::update('
            UPDATE items SET title = ?, info = ?
            WHERE itemID = ?
        ;', [$request->input('title'), $request->input('info'), $request->input('editingItemID')]);

        //delete links
        $this->deleteLinks($request->input('editingItemID'));

        // add records to link_items_categories table
        $this->insertLinks($request->input('editingItemID'), $request);

        return redirect('/edit-item/' . $request->input('editingItemID'))->with('success', 'Item updated successfully.');
    }

    public function deleteItem(Request $request){
        $dataModel = $this::prepareDataModel(['defaultData']);
        $dataModel['ami'] = 'admin';

        // validate input
        $this->validate($request, [
            'delete-item' => 'required'
        ],
        [],
        [
            'delete-item' => '"I want to delete this item for good"'
        ]);

        //delete item
        $this->deleteItemFromTable($request->input('editingItemID'));

        //delete links
        $this->deleteLinks($request->input('editingItemID'));

        return redirect('/admin')->with('success', 'Item deleted successfully.');
    }

    /*
    |-----------------------------
    | Misc
    |-----------------------------
    */

    static function getRegistrationKey(){
        return DB::select('SELECT value FROM admin_data WHERE name = "registration-key";')[0]->value;
    }

    static function deleteItemFromTable($itemID){
        DB::delete('
            DELETE FROM items
            WHERE itemID = ?
        ;', [$itemID]);
    }

    static function deleteLinks($itemID){
        DB::delete('DELETE FROM link_items_categories WHERE itemID = ?;', [$itemID]);
    }

    static function insertLinks($itemID, $request){
        $rows = DB::select('SELECT * FROM categories;');
        foreach($rows as $row){
            $htmlName = VHF::catIDToHtmlName($row->catID);
            if ($request->input($htmlName) && $request->input($htmlName) == $htmlName) {
                DB::insert('INSERT INTO link_items_categories (itemID, catID) VALUES (?, ?);', [$itemID, $row->catID]);
            }
        }
    }

    static function getCatSelection($catID, $page, $order){
        $offset = ($page-1) * 8;
        $order = ($order == 'asc' ? 'ASC' : 'DESC');
        return DB::select("
            SELECT items.itemID, title, info, fileName
            FROM items INNER JOIN link_items_categories AS links
              ON items.itemID = links.itemID AND links.catID = ?
            ORDER BY items.itemID $order
            LIMIT 8 OFFSET ?
        ;", [$catID, $offset]);
    }

    static function getCatPageCount($catID){
        $itemCount = DB::select("
            SELECT COUNT(*) AS itemCount
            FROM link_items_categories
            WHERE catID = ?
        ;", [$catID])[0]->itemCount;
        return (int)ceil($itemCount / 8);
    }

    static function getItem($itemID){
        return DB::select('SELECT * FROM items WHERE itemID = ?;', [$itemID])[0];
    }

    static function getItemsCategories($itemID){
        $rows = DB::select('
            SELECT catID
            FROM items
            INNER JOIN link_items_categories AS links
              ON items.itemID = links.itemID AND items.itemID = ?
        ;', [$itemID]);

        $itemCategories = [];
        foreach($rows as $row){
            $itemCategories[] = $row->catID;
        }
        return $itemCategories;
    }

    static function getHomepageItem(){
        $itemID = (int)DB::select('SELECT value FROM admin_data WHERE name = "homepage-itemID";')[0]->value;
        if ($itemID === 0){
            return DB::select('SELECT * FROM items ORDER BY rand() LIMIT 1;')[0];
        }else{
            return DB::select('SELECT * FROM items WHERE itemID = ?;', [$itemID])[0];
        }
    }

    static function updateHomepageItemID($itemID){
        DB::update('UPDATE admin_data SET value = ? WHERE name = "homepage-itemID";', [$itemID]);
    }
}
