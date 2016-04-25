<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\ViewHelperFunctions as VHF;

class ViewHelperFunctions extends Controller
{
    static function catIDToHtmlName($id){
        return "category-" . (string)$id;
    }

    static function htmlNameToCatID($name){
        $rows = DB::select('SELECT catID FROM categories');
        foreach($rows as $row){
            if (VHF::catIDToHtmlName($row->catID) == $name) return $row->catID;
        }
    }
}
