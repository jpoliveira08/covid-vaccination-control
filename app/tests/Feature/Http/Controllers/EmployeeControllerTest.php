<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class EmployeeControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_renders_employee_index_view()
    {
        $this->get(route('employee.index'))
            ->assertStatus(200)
            ->assertViewIs('employee.index');
    }

    #[Test]
    public function it_can_renders_employee_create_view()
    {
        $this->get(route('employee.create'))
            ->assertStatus(200)
            ->assertViewIs('employee.create');
    }
}
