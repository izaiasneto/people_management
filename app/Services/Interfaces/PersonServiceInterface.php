<?php

namespace App\Services\Interfaces;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface PersonServiceInterface
{
    public function all ( Request $request ): LengthAwarePaginator;

    public function store ( Request $request ): ?Person;

    public function update ( Request $request, Person $person ): Person;

    public function delete ( Person $person ): Person;

}