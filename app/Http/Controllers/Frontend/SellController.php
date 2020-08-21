<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Jobs\SendClaimInfoMail;
use App\Jobs\SendClaimMail;
use App\Models\Group;
use App\Models\Item;
use App\Models\Customer;
use Illuminate\Http\Request;

class SellController extends Controller
{
    public function index($group_filter = null)
    {
        if ($group_filter != null) {
            $items = Item::with(['group', 'event'])->whereNotNull('item_price')
                ->where([
                    ['item_price', 'IS NOT', null],
                    ['item_sold', false],
                    ['customer_id', null],
                    ['group_name', 'LIKE', $group_filter],
                ])->paginate(20);
        } else {
            $items = Item::with(['group', 'event'])->whereNotNull('item_price')
                ->where([
                    ['item_sold', false],
                    ['customer_id', null],
                ])->paginate(20);
        }

        return view('frontend.sell.sell', ['items' => $items]);
    }

    public function show($iid)
    {
        $item = Item::with(['group', 'event'])->findOrFail($iid);

        return view('frontend.sell.item', ['item'=> $item]);
    }

    public function claim(Request $request, $iid)
    {
        $customer_name = $request->input('customer_name');
        $customer_mail = $request->input('customer_mail');

        $claim = Customer::create([
            'customer_name' => $customer_name,
            'customer_mail' => $customer_mail,
        ]);

        $item = Item::with(['group', 'event'])->findOrFail($iid);

        $item->customer_id = $claim->id;
        $item->save();

        $customerMail = new SendClaimMail($claim, $item);
        $customerMail->handle();

        $infoMail = new SendClaimInfoMail($claim, $item);
        $infoMail->handle();

        return redirect('/')->with('message', 'Der Gegenstand wurde als Verloren markiert. Wir melden uns bei dir.');
    }
}
