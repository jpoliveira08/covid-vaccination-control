<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $guarded = [];

    public function vaccines()
    {
        return $this->belongsToMany(
            related: Vaccine::class,
            table: 'employee_vaccination',
            foreignPivotKey: 'employee_id',
            relatedPivotKey: 'vaccine_id',
        )
            ->withPivot(['dose_number', 'dose_date'])
            ->withTimestamps();
    }
}
