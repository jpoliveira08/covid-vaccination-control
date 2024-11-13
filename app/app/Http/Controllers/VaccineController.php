<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Vaccine\SearchVaccineRequest;
use App\Http\Requests\Vaccine\StoreVaccineRequest;
use App\Http\Requests\Vaccine\UpdateVaccineRequest;
use App\Models\Vaccine;
use App\Services\VaccineService;
use Illuminate\Http\JsonResponse;

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
    public function store(StoreVaccineRequest $request, VaccineService $vaccineService): JsonResponse
    {
        $vaccineService->store($request->validated());

        return response()->json([
            'message' => 'The vaccine was successfully created',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vaccine $vaccine)
    {
        return response()->json($vaccine);
    }

    public function destroy(Vaccine $vaccine, VaccineService $vaccineService): JsonResponse
    {
        $vaccineService->destroy($vaccine);

        return response()->json([
            'message' => 'The vaccine was successfully deleted.',
        ]);
    }

    public function update(
        UpdateVaccineRequest $request,
        Vaccine $vaccine,
        VaccineService $vaccineService
    ): JsonResponse {
        $vaccineService->update($request->validated(), $vaccine);

        return response()->json([
            'message' => 'The vaccine was successfully updated.',
        ]);
    }

    public function search(SearchVaccineRequest $request)
    {
        $searchValue = $request->query('search');
        $perPage = $request->query('per_page', 10);

        if (empty($searchValue)) {
            return response()->json([
                'options' => [],
                'total' => 0,
            ]);
        }

        $vaccines = Vaccine::where('name', 'like', '%'.$searchValue.'%')
            ->orWhere('batch', 'like', '%'.$searchValue.'%')
            ->paginate($perPage);

        $options = $vaccines->map(function ($vaccine) {
            $label = "Name: {$vaccine->name}, Batch: {$vaccine->batch}, Expiration date: {$vaccine->expiration_date}";

            return [
                'value' => $vaccine->id,
                'label' => $label,
            ];
        });

        return response()->json([
            'options' => $options,
            'total' => $vaccines->total(),
        ]);
    }
}
