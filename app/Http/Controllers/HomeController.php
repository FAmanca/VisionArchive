<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {

        // if(Auth::check()) {
        //     $user = Auth::user();
        //     if ($user && $user->BannedUntil) {
        //         // Membandingkan waktu sekarang dengan waktu banned_until
        //         if (Carbon::now('Asia/Jakarta')->greaterThanOrEqualTo($user->BannedUntil)) {

        //         }
        //     }
        // }

        // $newimages = Image::orderBy("created_at","desc")->get();
        $key = null;
        $newimages = Image::orderBy('created_at', 'desc')->get();
        $search = null;

        // foreach ($newimages as $newimage) {
        //     return $newimage->id;
        // }
        return view("home", [
            "newimages"=> $newimages,
            "keys" => $key,
            "search"=> $search
        ]);
    }
}
