<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidEmployeeVaccination implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!is_array($value) || empty($value)) {
            $fail('The :attribute must be an valid array.');
            return;
        }

        $numberOfEmployeeVaccinations = count($value);
        $numberOfEmployeeVaccinationsFields = 3;
        $numberOfNullValues = 0;
        $numberOfFilledValues = 0;
        foreach ($value as $arrayValue) {
            foreach ($arrayValue as $employeeVaccinationInput) {
                if ($employeeVaccinationInput === null) {
                    $numberOfNullValues++;
                } else {
                    $numberOfFilledValues++;
                }
            }
        }
        if (
            $numberOfNullValues !== ($numberOfEmployeeVaccinations * $numberOfEmployeeVaccinationsFields) &&
            $numberOfFilledValues !== ($numberOfEmployeeVaccinations * $numberOfEmployeeVaccinationsFields)
        ) {
            $fail('The :attribute must be an valid array.');
        }
    }
}
