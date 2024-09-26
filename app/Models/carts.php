<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carts extends Model
{
    protected $fillable=[
        'p_id','p_mass','p_price','user_id','bill_id','state'
    ];
    use HasFactory;
}
