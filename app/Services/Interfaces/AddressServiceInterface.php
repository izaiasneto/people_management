<?php

namespace App\Services\Interfaces;

use App\Models\Person;
use Illuminate\Http\Request;

interface AddressServiceInterface
{
    public function store ( Request $request, Person $person ): ?Person;

    // public function update ( Request $request, Address $address ): Address;
}