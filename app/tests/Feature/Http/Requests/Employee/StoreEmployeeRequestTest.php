<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Requests\Employee;

use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Rules\ValidCpf;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class StoreEmployeeRequestTest extends TestCase
{
    #[Test]
    public function it_has_the_correct_rules(): void
    {
        $request = new StoreEmployeeRequest();

        $rules = [
            'name' => ['required', 'string'],
            'cpf' => ['required', 'string', new ValidCpf()],
            'birth_date' => ['required', 'string'],
            'has_comorbidity' => ['boolean'],
        ];

        $this->assertEquals($rules, $request->rules());
    }

    #[Test]
    public function it_authorizes_every_request(): void
    {
        $request = new StoreEmployeeRequest();

        $this->assertTrue($request->authorize());
    }
}
