<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanProduct extends Model
{
    use HasFactory;

    protected $fillable = ['partner_id','name','period', 'method','deposit','interest','limit'];

    function FunctionName($partner_id){
        return $this->where('partner_id', $partner_id)->get();
    }
}
