<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Customer;
use Illuminate\Http\Request;

class FrontendController extends Controller{
    public function index($group_filter = null, $event_filter = null){
        if($group_filter != null && $event_filter != null){
            $items = Item::with(['group', 'event'])->where([
                ['item_sold', false],
                ['item_returned', false],
                ['customer_id', null],
                ['group_name', 'LIKE', $group_filter],
                ['event_name', 'LIKE', $event_filter],
            ])->paginate(20);
        }else if($group_filter != null){
            $items = Item::with(['group', 'event'])->where([
                ['item_sold', false],
                ['item_returned', false],
                ['customer_id', null],
                ['group_name', 'LIKE', $group_filter],
            ])->paginate(20);
        }else if($event_filter != null){
            $items = Item::with(['group', 'event'])->where([
                ['item_sold', false],
                ['item_returned', false],
                ['customer_id', null],
                ['event_name', 'LIKE', $event_filter],
            ])->paginate(20);
        }else{
            $items = Item::with(['group', 'event'])->where([
                ['item_sold', false],
                ['item_returned', false],
                ['customer_id', null],
            ])->paginate(20);
        }

        return view('frontend.frontend', ['items' => $items]);
    }

    public function show($iid){
        $item = Item::with(['group', 'event'])->find($iid);

        return view('frontend.item', ['item'=> $item]);
    }

    public function claim(Request $request, $iid){
        $customer_name = $request->input('customer_name');
        $customer_mail = $request->input('customer_mail');

        $claim = Customer::create([
            'customer_name' => $customer_name,
            'customer_mail' => $customer_mail,
        ]);

        $item = Item::find($iid);

        $item->customer_id = $claim->id;
        $item->save();

        return redirect('/')->with('message', 'Der Gegenstand wurde als Verloren markiert. Wir melden uns bei dir.');
    }
}
