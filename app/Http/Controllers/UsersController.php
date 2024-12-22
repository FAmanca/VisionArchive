<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {
        $users = User::paginate(5);
        return view('admin.manageusers', [
            'users' => $users,
            'search' => null
        ]);
    }

    public function search(Request $request) {
        $request->validate([
            'search' => 'required',
        ]);
        $search = $request->input('search');
        $users = User::where('username', 'like', '%' . $search . '%');
        return view('admin.manageusers', [
            'users' => $users->paginate(5),
            'search' => $search
        ]);
    }
}
