<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Vaccine extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function employees()
    {
        return $this->belongsToMany(Employee::class)
            ->withPivot(['dose_number', 'dose_date'])
            ->withTimestamps();
    }
}
