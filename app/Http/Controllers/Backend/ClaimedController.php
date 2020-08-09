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

    public function update($cid, Request $request){
        $action = $request->action;

        if($action == 'returned'){
            $claim = Customer::with('Item')->find($cid)->first();

            $claim->item->item_returned = true;
            $claim->push();

            print_r($claim);
        }else if($action == 'sold'){
            $claim = Customer::with('Item')->find($cid)->first();

            $claim->item->item_sold = true;
            $claim->push();
        }

        return redirect()->back()->with('message', 'Änderung wurde vorgenommen');
    }

    public function destroy($cid){
        Customer::destroy($cid);

        return redirect()->back()->with('message', 'Claim erfolgreich gelöscht.');
    }
}
