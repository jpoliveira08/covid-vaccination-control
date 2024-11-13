<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Schema;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class EmployeeTest extends TestCase
{

    #[Test]
    public function employees_table_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('employees', [
                'id', 'name', 'cpf', 'birth_date', 'has_comorbidity', 'created_at', 'updated_at', 'deleted_at'
            ])
        );
    }
}
