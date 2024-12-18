<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Image;
use App\Models\Comment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $totalUsers = User::count();
        $totalImages = Image::count();
        $totalComments = Comment::count();
        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'totalImages' => $totalImages,
            'totalComments' => $totalComments,
        ]);
    }
}