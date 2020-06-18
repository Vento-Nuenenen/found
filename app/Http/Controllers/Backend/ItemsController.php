<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class ItemsController extends Controller
{
    public function index(){
        return view('backend.items.items');
    }
}
