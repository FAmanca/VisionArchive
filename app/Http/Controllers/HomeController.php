<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        // $newimages = Image::orderBy("created_at","desc")->get();
        $key = null;
        $newimages = Image::orderBy('created_at', 'desc')->get();
        $search = null;
        return view("home", [
            "newimages"=> $newimages,
            "keys" => $key,
            "search"=> $search
        ]);
    }
}
