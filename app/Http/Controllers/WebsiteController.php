<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    function home(){
        return view('website.home');
    }
    
    function menu(){
        return view('website.menu');
    }

    function about(){
        return view('website.about');
    }
    function checkout(){
        return view('website.checkout');
    }
}
