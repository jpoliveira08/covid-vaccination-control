<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public function vaccines()
    {
        return $this->belongsToMany(Vaccine::class)
            ->withPivot(['dose_number', 'dose_date'])
            ->withTimestamps();
    }
}
