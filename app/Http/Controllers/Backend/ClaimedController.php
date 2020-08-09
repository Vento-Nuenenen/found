<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use voku\helper\ASCII;

class ClaimedController extends Controller
{
    public function index(){
        $claims = Customer::with('Item')->get();

        return view('backend.claimed.claimed', ['claims' => $claims]);
    }

    public function show($cid){
        $claim = Customer::find($cid);

        return view('backend.claimed.show', ['claim' => $claim]);
    }

    public function destroy($cid){
        Customer::destroy($cid);

        return redirect()->back()->with('message', 'Customer erfolgreich gelöscht.');
    }
}
