<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ban;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BannedController extends Controller
{
    public function index() {
        $user = Auth::user();
        return view('banned',[
            'user' => $user,
        ]);
    }
    public function banned(Request $request, User $user) {
        $ban = new Ban();
        $ban->UserID = $user->id;
        $ban->BanReason = $request->reason;
        $ban->BannedUntil = Carbon::now('Asia/Jakarta')->addMinutes($request->durasiban);
        $ban->save();
        return back();
    }
}
