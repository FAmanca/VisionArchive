<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LikeController extends Controller
{
    public function like(Image $image) {
        $likeExist = Like::where('UserId', Auth::id())
                            ->where('FotoId', $image->id)
                            ->first();

        if ($likeExist) {
            $likeExist->delete();
            return back();
        } else {
            $like = new Like;
            $like->FotoId = $image->id;
            $like->UserId = Auth::id();
            $like->tanggal_like = Carbon::now('Asia/Jakarta');
            $like->save();
            return back();
        }
    }

}
