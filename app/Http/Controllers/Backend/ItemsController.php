<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Item;
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
            $items = Item::all();
        } else {
            $search_string = $request->input('search');
            $items = DB::table('items')
                ->select('items.*')
                ->where('items.item_name', 'LIKE', "%$search_string%")
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
        return view('backend.items.add');
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

        Item::create([
            'item_identifier' => $item_identifier,
            'item_name' => $item_name,
            'item_color' => $group_active,
            'item_size' => $group_active,
            'returned' => $group_active,
            'item_price' => $group_active,
            'for_sale' => $group_active,
            'sold' => $group_active,
            'fk_events' => $group_active,
            'fk_groups' => $group_active,
            'fk_customers' => $group_active,
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
        $groups = Item::where('id', '=', $iid)->first();

        return view('backend.items.edit', ['groups' => $groups]);
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
        $group_name = $request->input('group_name');
        $group_active = $request->input('group_active') == 'on';

        DB::table('groups')->where('id', '=', $iid)->update([
            'group_name' => $group_name,
            'group_active' => $group_active
        ]);

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
