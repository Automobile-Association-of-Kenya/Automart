<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Maillist extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'usage',
        'host',
        'address',
        'password',
        'protocol',
        'port',
        'status',
        'active',
        'updated_by',
    ];
}
