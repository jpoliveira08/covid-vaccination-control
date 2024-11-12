<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Models\Employee;
use App\Services\EmployeeService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(): View
    {
        return view('employee.index');
    }

    public function create(): View
    {
        return view('employee.create');
    }

    public function store(StoreEmployeeRequest $request, EmployeeService $employeeService)
    {
        $employeeService->store($request->validated());

        return to_route('employee.index');
    }
}
