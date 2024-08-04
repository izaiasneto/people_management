<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    protected $fillable = [
        'person_id',
        'address_type',
        'cep',
        'street',
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
