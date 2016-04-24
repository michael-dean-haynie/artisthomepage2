<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

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
                SELECT name FROM categories
                ;
            ');
        }
        return $dataModel;
    }

    /*
    |-----------------------------
    | Display Pages
    |-----------------------------
    */

    public function getHome(Request $request){
        $dataModel = $this::prepareDataModel(['allCategories']);
        $dataModel['ami'] = 'home';
        return view('pages/home', $dataModel);
    }

    public function getAdmin(Request $request){
        $dataModel = $this::prepareDataModel(['allCategories']);
        $dataModel['ami'] = '';
        return view('pages/admin', $dataModel);
    }

    public function getCategory(Request $request){
        $dataModel = $this::prepareDataModel(['allCategories']);
        $dataModel['ami'] = '';
        return view('pages/category', $dataModel);
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
