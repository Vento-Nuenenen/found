<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClaimedController extends Controller
{
    public function index(){
        return view('claimed.claimed');
    }

    public function destroy(){

    }
}
