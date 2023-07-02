<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vehicle_id',
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
protected $with = ['country:id,name','industry:id,name'];

public function vehicle(): BelongsTo
{
    return $this->belongsTo(Vehicle::class, 'vehicle_id');
}

public function industry(): BelongsTo
{
    return $this->belongsTo(Industry::class, 'industry_id');
}

public function country(): BelongsTo
{
    return $this->belongsTo(Country::class, 'country_id');
}
}
