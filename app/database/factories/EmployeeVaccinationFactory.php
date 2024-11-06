<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\{Employee, EmployeeVaccination, Vaccine};
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployeeVaccination>
 */
class EmployeeVaccinationFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = EmployeeVaccination::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => Employee::factory(),
            'vaccine_id' => Vaccine::factory(),
            'dose_number' => $this->faker->numberBetween(1, 3),
            'dose_date' => $this->faker->dateTimeBetween('-1 year', 'now')
        ];
    }
}
