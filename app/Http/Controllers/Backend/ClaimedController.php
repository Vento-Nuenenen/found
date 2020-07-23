<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Claim;
use Illuminate\Http\Request;

class ClaimedController extends Controller
{
    public function index(){
        $claims = Claim::all();

        return view('backend.claimed.claimed', ['claims' => $claims]);
    }

    public function destroy(){

    }
}
