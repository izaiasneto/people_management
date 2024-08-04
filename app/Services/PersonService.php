<?php

namespace App\Services;

use App\Models\Person;
use App\Services\Interfaces\PersonServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class PersonService implements PersonServiceInterface{

    public function all ( Request $request ): LengthAwarePaginator
    {
        return $this->filter($request)->paginate(10);
    }

    public function store( Request $request): Person
    {
        return Person::create($request->all());
    }

    public function update( Request $request, Person $person): Person
    {
        $person->update($request->all());
        return $person;
    }

    public function delete( Person $person): Person
    {
        $person->delete();
        return $person;
    }

    public function filter ( $request ): Builder
    {
        $search = $request->search;
       
        $people = Person::with('addresses')->when($search, function ($query, $search) {
                        $query->where('name', 'LIKE', '%' . $search . '%')
                            ->orWhere('cpf', 'LIKE', '%' . $search . '%')
                            ->orWhere('id', 'LIKE', '%' . $search . '%');               
                    });

        return $people->orderBy('id', 'desc');
    }
}
