<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment(Request $request) {
        $nowDate = Carbon::now('Asia/Jakarta');
        $request->validate([
            'isi_komentar' => 'required|string|max:255',
        ]);

        $comment = new Comment();
        $comment->FotoId = $request->id_foto;
        $comment->UserId = Auth::user()->id;
        $comment->isi_komentar = $request->isi_komentar;
        $comment->tanggal_komentar = $nowDate;
        $comment->save();

        return back();
    }
}
