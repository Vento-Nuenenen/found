<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class ClaimedController extends Controller
{
    public function index()
    {
        $claims = Customer::with('Item')->get();

        return view('backend.claimed.claimed', ['claims' => $claims]);
    }

    public function show($cid)
    {
        $claim = Customer::find($cid);
        $users = User::all();

        return view('backend.claimed.show', ['claim' => $claim, 'users' => $users]);
    }

    public function update($cid, Request $request)
    {
        $action = $request->action;

        if ($action == 'returned') {
            $claim = Customer::with('Item')->find($cid)->first();

            $claim->item->item_returned = true;
            $claim->push();

            print_r($claim);
        } elseif ($action == 'sold') {
            $claim = Customer::with('Item')->find($cid)->first();

            $claim->item->item_sold = true;
            $claim->push();
        }elseif($action == 'assign'){
            $claim = Customer::with('Item')->find($cid)->first();

            $claim->user_id = $request->assign_user;
            $claim->push();
        }

        return redirect()->back()->with('message', 'Änderung wurde vorgenommen');
    }

    public function destroy($cid)
    {
        Customer::destroy($cid);

        return redirect()->back()->with('message', 'Claim erfolgreich gelöscht.');
    }
}
