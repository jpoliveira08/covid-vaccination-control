<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Vaccine extends Model
{
    use HasFactory;

    protected $table = 'vaccines';

    protected $guarded = [];

    public function employees()
    {
        return $this->belongsToMany(
            related: Employee::class,
            table: 'employee_vaccination',
            foreignPivotKey: 'employee_id',
            relatedPivotKey: 'vaccine_id',
        )
            ->withPivot(['dose_number', 'dose_date'])
            ->withTimestamps();
    }
}
