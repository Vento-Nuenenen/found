<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Item;

class FrontendController extends Controller{
    public function index(){
        $items = Item::with(['group', 'event'])->paginate(20);

        return view('frontend.frontend', ['items' => $items]);
    }

    public function show($iid){
        $item = Item::with(['group', 'event'])->find($iid);

        return view('frontend.item', ['item'=> $item]);
    }
}
