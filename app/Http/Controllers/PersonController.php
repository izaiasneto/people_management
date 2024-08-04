<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonRequest;
use App\Models\Person;
use App\Services\Interfaces\PersonServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class PersonController extends Controller
{
    public function __construct ( protected PersonServiceInterface $personService)
    {}

    public function index( Request $request ): Response
    {
        $people = $this->personService->all($request);

        return Inertia::render('Person/Index', [
            'people' => $people,
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Person/Create');
    }

    public function store( StorePersonRequest $request ): Response|RedirectResponse
    {
        try {
            DB::beginTransaction();
            
            $person = $this->personService->store($request);

            DB::commit();

            return Inertia::render('Person/Create', [
                'person' => $person,
            ])->with('success', 'Pessoa cadastrada com sucesso!');

        }catch(\Throwable $tw) {
            DB::rollBack();
            
            return Redirect::back()->with(['success' => false, 'message' => 'Falha ao cadastrar a pessoa!']);
        } 
    }

    public function show( Person $person ): Response
    {
        return Inertia::render('Person/Show', [ 'person' => $person]);
    }

    public function edit( Person $person ): Response
    {
        return Inertia::render('Person/Edit', [ 'person' => $person]);
    }

    public function update( Request $request, Person $person ): RedirectResponse
    {
        try {
            DB::beginTransaction();
            
            $this->personService->update($request, $person);

            DB::commit();
            return redirect()->route('person.index')->with(['success' => true, 'message' => 'Pessoa cadastrada com sucesso!']);
        }catch(\Throwable $tw) {
            DB::rollBack();
            return Redirect::back()->with(['success' => false, 'message' => 'Falha ao cadastrar a pessoa!']);
        } 
    }
}
