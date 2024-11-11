<?php

use App\Models\Employee;
use App\Models\Vaccine;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employee_vaccinations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignId('vaccine_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->tinyInteger('dose_number');
            $table->date('dose_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_vaccinations');
    }
};
