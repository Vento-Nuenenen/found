<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class OverwatchController extends Controller
{
    public function index()
    {
        return view('backend.overwatch.overwatch');
    }
}
