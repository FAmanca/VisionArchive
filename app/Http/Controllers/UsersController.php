<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {
        $users = User::paginate(3);
        return view('admin.manageusers', [
            'users' => $users
        ]);
    }
}
