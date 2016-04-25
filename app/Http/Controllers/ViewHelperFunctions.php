<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ViewHelperFunctions extends Controller
{
    static function catIDToHtmlName($id){
        return "category-" . (string)$id;
    }
}
