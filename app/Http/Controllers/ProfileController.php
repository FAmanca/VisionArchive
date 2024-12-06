<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index() {
        $images = Auth::user()->images;
        return view("profile", [
            "images"=> $images
        ]);
    }
}
