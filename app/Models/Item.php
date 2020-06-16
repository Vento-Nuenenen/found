<?php

namespace App\Models;

class Item extends Model{
    protected $table = 'items';

    protected $fillable = ['item_identifier', 'item_name'];
}
