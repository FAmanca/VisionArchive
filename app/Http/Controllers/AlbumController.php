<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    public function store(Request $request)
    {
        $nowDate = Carbon::now('Asia/Jakarta');
        $validated = $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:8',
        ]);

        $album = new Album();
        $album->nama_album = $validated['title'];
        $album->deskripsi = $validated['description'];
        $album->tanggal_buat = $nowDate;
        $album->UserID = Auth::user()->id;
        $album->save();

        return redirect()->route('image.create')->with('success', 'Create Album Complete');
    }

    public function update(Request $request, Album $album)
    {
        $nowDate = Carbon::now('Asia/Jakarta');
        $validated = $request->validate([
            'title' => 'min:5',
            'description' => 'min:8',
        ]);

        $album = Album::findOrFail($album->id);
        $album->nama_album = $validated['title'];
        $album->deskripsi = $validated['description'];
        $album->save();

        return back();
    }

    public function delete(Album $album)
    {
        $album = Album::with('images.comments')->find($album->id);

        foreach ($album->images as $image) {
            // Hapus komentar dulu le
            $image->comments()->delete();
            // Hapus Like
            $image->likes()->delete();
            // Hapus gambar le
            $image->delete();
        }
        // Ini ngehapus album
        $album->delete();

        return back();
    }
}
