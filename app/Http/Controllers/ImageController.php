<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Album;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    public function create()
    {
        $data = null;
        $albums = Auth::user()->albums;
        return view("create", [
            "albums" => $albums,
            "data"=> $data
        ]);
    }

    public function store(Request $request)
    {
        //return $request;
        $nowDate = Carbon::now('Asia/Jakarta');
        $request->validate([
            'judul_foto' => 'required|string|max:255',
            'deskripsi_foto' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:32768',
            'albumID' => 'required|exists:albums,id',
        ]);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('images', 'public');
        } else {
            return back()->with('error', 'Foto tidak ditemukan');
        }


        $image = new Image();
        $image->judul_foto = $request->judul_foto;
        $image->deskripsi_foto = $request->deskripsi_foto;
        $image->tanggal_unggah = $nowDate;
        $image->foto = $path;
        $image->albumID = $request->albumID;
        $image->userID = Auth::user()->id;
        $image->save();

        return redirect()->route('home')->with('success', 'Foto berhasil diunggah!');
    }

    public function edit(Image $image) {
        $data = $image;
        $albums = Auth::user()->albums;
        return view("create", [
            "albums" => $albums,
            "data"=> $data,
        ]);
    }

    public function update(Request $request, Image $image) {
        $nowDate = Carbon::now('Asia/Jakarta');
        $request->validate([
            'judul_foto' => 'required|string|max:255',
            'deskripsi_foto' => 'required|string',
            'albumID' => 'required|exists:albums,id',
        ]);

        $image = Image::findOrFail($image->id);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('images', 'public');
            $image->foto = $path;
        }
        $image->judul_foto = $request->judul_foto;
        $image->deskripsi_foto = $request->deskripsi_foto;
        $image->tanggal_unggah = $nowDate;

        $image->albumID = $request->albumID;
        $image->userID = Auth::user()->id;
        $image->save();

        return redirect()->route('home')->with('success', 'Foto berhasil diupdate!');
    }

    public function delete(Image $image)
    {

        if ($image) {
            $image->delete();
            return redirect()->route('profile')->with('success', 'Image deleted successfully');
        }

        return redirect()->route('profile')->with('error', 'Image not found');
    }
}
