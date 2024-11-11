<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Models\Employee;
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

    public function store(StoreEmployeeRequest $request)
    {
        // Cadastrar somente com dados do employee
        Employee::create($request->all());
        return to_route('employee.index');
    }
}
