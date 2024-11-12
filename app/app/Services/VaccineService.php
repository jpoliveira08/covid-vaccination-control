<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Vaccine;

class VaccineService
{
    public function store(array $vaccineData)
    {
        return Vaccine::create($vaccineData);
    }

    public function destroy(Vaccine $vaccine)
    {
        return $vaccine->delete();
    }

    public function update(array $vaccineData, Vaccine $vaccine)
    {
        return $vaccine->update($vaccineData);
    }
}
