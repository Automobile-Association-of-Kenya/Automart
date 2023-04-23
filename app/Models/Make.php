<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Make extends Model
{
    use HasFactory;

    protected $fillable = [''];

    /**
     * Get all of the models for the Make
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function models(): HasMany
    {
        return $this->hasMany(VehicleModel::class, 'make_id', 'id');
    }


}
