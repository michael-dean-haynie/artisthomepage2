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
        if (in_array('allCategories', $dataNames)){
            $dataModel['allCategories'] = DB::select('
                SELECT * FROM categories
                ;
            ');
        }
        return $dataModel;
    }

    /*
    |-----------------------------
    | GET
    |-----------------------------
    */

    public function getHome(Request $request){
        $dataModel = $this::prepareDataModel(['allCategories']);
        $dataModel['ami'] = 'home';
        return view('pages/home', $dataModel);
    }


    public function getCategory(Request $request){
        $dataModel = $this::prepareDataModel(['allCategories']);
        $dataModel['ami'] = '';
        return view('pages/category', $dataModel);
    }

    public function getAdmin(Request $request){
        $dataModel = $this::prepareDataModel(['allCategories']);
        $dataModel['ami'] = 'admin';
        return view('pages/admin', $dataModel);
    }

    public function getUploadItem(Request $request){
        $dataModel = $this::prepareDataModel(['allCategories']);
        $dataModel['ami'] = 'admin';
        return view('pages/upload-item', $dataModel);
    }

    /*
    |-----------------------------
    | POST
    |-----------------------------
    */



    public function postUploadItem(Request $request){
        $dataModel = $this::prepareDataModel(['allCategories']);
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
        $rows = DB::select('SELECT * FROM categories;');
        foreach($rows as $row){
            $htmlName = VHF::catIDToHtmlName($row->catID);
            if ($request->input($htmlName)) {
                DB::insert('INSERT INTO link_items_categories (itemID, catID) VALUES (?, ?);', [$itemID, $row->catID]);
            }
        }

        return redirect('/upload-item')->with('success', 'File uploaded successfully.');
    }

    /*
    |-----------------------------
    | Misc
    |-----------------------------
    */

    static function getAdminKey(){
        return DB::select('SELECT value FROM admin_data WHERE adminDataID = 1;')[0]->value;
    }
}
