<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Schema;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class VaccineTest extends TestCase
{
    #[Test]
    public function vaccines_table_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('vaccines', [
                'id', 'name', 'batch', 'expiration_date', 'created_at', 'updated_at', 'deleted_at'
            ])
        );
    }
}
