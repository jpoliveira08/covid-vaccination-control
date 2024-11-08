<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreVaccineRequest;
use App\Models\Vaccine;
use Illuminate\Http\Request;

class VaccineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('vaccine.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vaccine.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVaccineRequest $request)
    {
        $vaccine = Vaccine::create($request->validated());

        return redirect()->route('vaccine.show', $vaccine);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vaccine $vaccine)
    {
        return view('vaccine.show', compact('vaccine'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vaccine $vaccine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vaccine $vaccine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vaccine $vaccine)
    {
        //
    }
}
