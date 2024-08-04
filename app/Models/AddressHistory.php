<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AddressHistory extends Model
{
    protected $fillable = [
        'person_id',
        'address_type',
        'cep',
        'logradouro',
        'number',
        'complement',
        'neighborhood',
        'state',
        'city',
    ];

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }
}
