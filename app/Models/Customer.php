<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model{
    protected $table = 'customers';

    protected $fillable = ['customer_name', 'customer_mail'];

    public function item(){
        return $this->hasOne('App\Models\Item');
    }
}
