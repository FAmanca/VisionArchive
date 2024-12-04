<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    public function store(Request $request) {
        $nowDate = Carbon::now('Asia/Jakarta');
        $validated = $request->validate([
            'title' => 'required|min:5',
            'description'=> 'required|min:8',
        ]);

        $album = new Album();
        $album->nama_album = $validated['title'];
        $album->deskripsi = $validated['description'];
        $album->tanggal_buat = $nowDate;
        $album->UserID = Auth::user()->id;
        $album->save();

        return redirect()->route('image.create')->with('success', 'Create Album Complete');
    }
}
