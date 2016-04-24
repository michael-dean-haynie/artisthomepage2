<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function getHome(Request $request){
        return view('pages/feature');
    }
}
