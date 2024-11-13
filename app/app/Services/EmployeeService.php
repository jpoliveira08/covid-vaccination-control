<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class EmployeeService
{
    public function store(array $employeeData)
    {
        $employeeData = $this->cleanEmptyEmployeeVaccination($employeeData);
        $employeeData['cpf'] = clean_cpf($employeeData['cpf']);

        $vaccines = !empty($employeeData['vaccines']) ? $employeeData['vaccines'] : [];
        unset($employeeData['vaccines']);

        return DB::transaction(function () use ($employeeData, $vaccines) {
            $employee = Employee::create($employeeData);

            if ($vaccines) {
                $employee->vaccines()->attach($vaccines);
            }
        });
    }

    private function cleanEmptyEmployeeVaccination(array $employeeData): array
    {
        if (!isset($employeeData['vaccines'])) {
            return $employeeData;
        }

        foreach ($employeeData['vaccines'] as $key => $vaccine) {
            if (
                !isset($vaccine['id_vaccine']) &&
                !isset($vaccine['dose_date'])  &&
                !isset($vaccine['dose_number'])
            ) {
                unset($employeeData['vaccines'][$key]);
            }
        }

        return $employeeData;
    }

    public function destroy(Employee $employee)
    {
        return $employee->delete();
    }
}
