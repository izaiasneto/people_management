<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Person extends Model
{
    protected $fillable = [
        'name',
        'social_name',
        'cpf',
        'father_name',
        'mother_name',
        'phone',
        'email',
    ];

    protected $with = ['addresses'];

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    public function addressHistory(): HasMany
    {
        return $this->hasMany(AddressHistory::class);
    }

}
