<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Group;
use App\Models\Item;
use DB;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ItemsController extends Controller
{
    /**
     * @param Request $request
     *
     * @return Application|Factory|View
     */
    public function index(Request $request){
        if ($request->input('search') == null) {
            $items = Item::paginate(20);
        } else {
            $search_string = $request->input('search');
            $items = DB::table('items')
                ->select('items.*')
                ->where('items.item_name', 'LIKE', "%$search_string%")
                ->paginate(20)
                ->get();
        }

        return view('backend.items.items', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(){
        $item_events = Event::all();
        $item_groups = Group::all();

        return view('backend.items.add', ['item_events' => $item_events, 'item_groups' => $item_groups]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function store(Request $request){
        $item_identifier = $request->input('item_identifier');
        $item_name = $request->input('item_name');
        $item_color = $request->input('item_color');
        $item_size = $request->input('item_size');
        $item_returned = !empty($request->input('item_returned')) ? true : false;
        $item_price = $request->input('item_price') * 100;
        $item_sold = !empty($request->input('item_sold')) ? true : false;
        $item_event = $request->input('item_event');
        $item_group = $request->input('item_group');

        if($request->file('item_img')){
            $img_name = time() .'.' . $request->file('item_img')->extension();
            $request->file('item_img')->move(storage_path('app/public/img'), $img_name);
        }else{
            $img_name = null;
        }

        Item::create([
            'item_identifier' => $item_identifier,
            'item_name' => $item_name,
            'item_color' => $item_color,
            'item_size' => $item_size,
            'item_returned' => $item_returned,
            'item_price' => $item_price,
            'item_sold' => $item_sold,
            'item_img' => $img_name,
            'event_id' => $item_event,
            'group_id' => $item_group,
        ]);

        return redirect()->back()->with('message', 'Item wurde erstellt.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $iid
     *
     * @return Application|Factory|View
     */
    public function edit($iid){
        $item = Item::where('id', '=', $iid)->first();
        $item_events = Event::all();
        $item_groups = Group::all();

        return view('backend.items.edit', ['item' => $item, 'item_events' => $item_events, 'item_groups' => $item_groups]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $iid
     *
     * @return RedirectResponse
     */
    public function update(Request $request, $iid){
        $item_identifier = $request->input('item_identifier');
        $item_name = $request->input('item_name');
        $item_color = $request->input('item_color');
        $item_size = $request->input('item_size');
        $item_returned = !empty($request->input('item_returned')) ? true : false;
        $item_price = $request->input('item_price') * 100;
        $item_sold = !empty($request->input('item_sold')) ? true : false;
        $item_event = $request->input('item_event');
        $item_group = $request->input('item_group');

        if($request->file('item_img')){
            $img_name = time() .'.' . $request->file('item_img')->extension();
            $request->file('item_img')->move(storage_path('app/public/img'), $img_name);
        }else{
            $img_name = null;
        }

        $item = Item::find($iid);
        $item->item_identifier = $item_identifier;
        $item->item_name = $item_name;
        $item->item_color = $item_color;
        $item->item_size = $item_size;
        $item->item_returned = $item_returned;
        $item->item_price = $item_price;
        $item->item_sold = $item_sold;

        if($img_name != null){
            $item->item_img = $img_name;
        }

        $item->event_id = $item_event;
        $item->group_id = $item_group;

        $item->save();

        return redirect()->back()->with('message', 'Item wurde aktualisiert .');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $iid
     *
     * @return RedirectResponse
     */
    public function destroy($iid){
        DB::table('items')->where('id', '=', $iid)->delete();

        return redirect()->back()->with('message', 'Item erfolgreich gelöscht.');
    }
}
