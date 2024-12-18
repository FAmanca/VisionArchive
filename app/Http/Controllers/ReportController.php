<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index() {
        $reports = Report::paginate(5);
        return view('admin.reports', [
            'reports' => $reports,
        ]);
    }

    public function create(Request $request, Image $image) {
        $request->validate([
            'category' => 'required|string|in:Spam/Advertisement,Inappropriate Content,Copyright Violation,Harassment/Bullying,Pornography/Adult Content',
            'reason' => 'nullable|string',
        ]);

        $report = new Report();
        $report->UserId = Auth::user()->id;
        $report->FotoId = $image->id;
        $report->category = $request->input('category');
        $report->reason = $request->input('reason');
        $report->save();

        return back();
    }
}
