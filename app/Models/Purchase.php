<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','vehicle_id','name','id_no','phone','email','pickup','estate','housenumber','payment_method','status'];
}
