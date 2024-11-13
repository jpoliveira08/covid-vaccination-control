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

    public function show(Employee $employee): View
    {
        return view('employee.show', compact('employee'));
    }

    public function delete(Employee $employee): View
    {
        return view('employee.delete', compact('employee'));
    }

    public function store(StoreEmployeeRequest $request, EmployeeService $employeeService)
    {
        $employeeService->store($request->validated());

        return to_route('employee.index');
    }

    public function destroy(Employee $employee, EmployeeService $employeeService)
    {
        $employeeService->destroy($employee);

        return to_route('employee.index')->with('message', 'Employee deleted successfully');
    }
}
