<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Image;
use App\Models\Comment;
use App\Models\Report;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $totalUsers = User::count();
        $totalImages = Image::count();
        $totalComments = Comment::count();
        $totalReports = Report::count();
        $users = User::whereDate('created_at', today())->get();
        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'totalImages' => $totalImages,
            'totalComments' => $totalComments,
            'totalReports' => $totalReports,
        ]);
    }
}
