<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ViewHelperFunctions extends Controller
{
    static function stringToHtmlName($string){
        return str_replace(' ', '-', trim(strtolower($string)));
    }
}
