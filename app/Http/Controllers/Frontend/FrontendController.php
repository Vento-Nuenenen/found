<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Item;

class FrontendController extends Controller{
    public function index(){
        $items = Item::with(['group', 'event'])->paginate(20);

        return view('frontend.frontend', ['items' => $items]);
    }
}
