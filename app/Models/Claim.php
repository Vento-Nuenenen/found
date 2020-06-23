<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model{
    protected $table = 'customers';

    protected $fillable = ['customer_name', 'customer_mail'];
}
