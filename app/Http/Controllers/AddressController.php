<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonRequest;
use App\Models\Person;
use App\Services\Interfaces\AddressServiceInterface;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;

class AddressController extends Controller
{
    public function __construct ( protected AddressServiceInterface $addressService)
    {}

    public function store( Request $request, Person $person )
    {
        try {
            DB::beginTransaction();
            
            $person = $this->addressService->store($request, $person);

            DB::commit();

            return Inertia::render('Person/Create', [
                'person' => $person,
            ])->with('success', 'Endereço adicionado com sucesso!');

        }catch(\Throwable $tw) {
            DB::rollBack();
            
            return Redirect::back()->with(['success' => false, 'message' => 'Falha ao cadastrar o endereço!']);
        } 
    }

    // public function update( Request $request, Person $person ): RedirectResponse
    // {
    //     try {
    //         DB::beginTransaction();
            
    //         $this->personService->update($request, $person);

    //         DB::commit();
    //         return redirect()->route('person.index')->with(['success' => true, 'message' => 'Pessoa cadastrada com sucesso!']);
    //     }catch(\Throwable $tw) {
    //         DB::rollBack();
    //         return Redirect::back()->with(['success' => false, 'message' => 'Falha ao cadastrar a pessoa!']);
    //     } 
    // }
}
