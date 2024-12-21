<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'key' => 'required',
        ]);

        $newimages = Image::orderBy('created_at', 'desc')->get();
        $key = $request->key;
        $search = Image::where('judul_foto', 'like', "%$key%")->get();

        return view('home', [
            'search' => $key,
            "keys" => $search,
            "newimages" => $newimages
        ]);
    }
}
