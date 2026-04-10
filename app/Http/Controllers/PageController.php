<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home() {
        return "Bienvenue Home";
    }
    
    public function about() {
        return "Page About";
    }
    
    public function contact() {
        return "Page Contact";
    }
    
    public function show($id) {
        return "Page ID: " . $id;
    }  //
}
