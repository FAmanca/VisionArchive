<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        // $newimages = Image::orderBy("created_at","desc")->get();
        $newimages = Image::all();
        return view("home", [
            "newimages"=> $newimages
        ]);
    }
}
