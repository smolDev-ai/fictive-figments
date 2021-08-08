<?php

namespace App\Http\Controllers;

use App\Models\UserReport;
use Illuminate\Http\Request;

class UserReportController extends Controller
{
    public function index()
    {
        return view('admin.reports.index', [
            "reports" => UserReport::all()->sortByDesc('created_at'),
        ]);
    }

    public function show($id)
    {
        return view("admin.reports.show", [
            "report" => UserReport::where('id', $id)->first()
        ]);
    }

    public function store()
    {
        //
    }

    public function destroy()
    {
        //
    }
}
