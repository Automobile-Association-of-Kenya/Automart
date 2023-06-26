<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'firstname',
        'lastname',
        'date_of_birth',
        'email',
        'phone',
        'kra_pin',
        'id_no',
        'country_id',
        'city',
        'estate',
        'house_no',
        'occupation',
        'employement_type',
        'industry_id',
        'proffession',
        'employer',
        'years_of_employment',
        'employer_address',
        'business',
        'businessowner',
        'business_name',
        'business_reg_no',
        'businesstype',
        'businessaddress',
        'type_of_bank_account',
        'bank',
        'accountholdername',
        'account_number',
        'bank_account_type',
        'monthly_turnover',
    ];
}
