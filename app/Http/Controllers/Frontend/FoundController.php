<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Jobs\SendClaimInfoMail;
use App\Jobs\SendClaimMail;
use App\Models\Event;
use App\Models\Group;
use App\Models\Item;
use App\Models\Customer;
use Illuminate\Http\Request;

class FoundController extends Controller
{
    public function index($group_filter = null, $event_filter = null)
    {
        $groups = Group::where('group_active', true)->get();
        $events = Event::where('event_active', true)->get();

        if ($group_filter != null && $event_filter != null) {
            $items = Item::with(['group', 'event'])->where([
                ['item_price', null],
                ['item_returned', false],
                ['customer_id', null],
                ['group_name', 'LIKE', $group_filter],
                ['event_name', 'LIKE', $event_filter],
            ])->paginate(20);
        } elseif ($group_filter != null) {
            $items = Item::with(['group', 'event'])->where([
                ['item_price', null],
                ['item_returned', false],
                ['customer_id', null],
                ['group_name', 'LIKE', $group_filter],
            ])->paginate(20);
        } elseif ($event_filter != null) {
            $items = Item::with(['group', 'event'])->where([
                ['item_price', null],
                ['item_returned', false],
                ['customer_id', null],
                ['event_name', 'LIKE', $event_filter],
            ])->paginate(20);
        } else {
            $items = Item::with(['group', 'event'])->where([
                ['item_price', null],
                ['item_returned', false],
                ['customer_id', null],
            ])->paginate(20);
        }

        return view('frontend.found.found', ['items' => $items, 'events' => $events, 'groups' => $groups]);
    }

    public function show($iid)
    {
        $item = Item::with(['group', 'event'])->findOrFail($iid);

        return view('frontend.found.item', ['item'=> $item]);
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
