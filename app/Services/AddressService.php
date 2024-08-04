<?php

namespace App\Services;

use App\Models\Person;
use App\Services\Interfaces\AddressServiceInterface;
use Illuminate\Http\Request;


class AddressService implements AddressServiceInterface
{
    public function store( Request $request, Person $person): Person
    {
        $request->merge([
            'type' => $request->input('type') == 'Residencial' ? 'residencial' : 'commercial',
        ]);

        $person->address()->create($request->all());

        return $person;
    }

    // public function update( Request $request, Address $person): Address
    // {
    //     $person->update($request->all());
    //     return $person;
    // }
}
