<?php

namespace Tests\Feature\Http\Requests;

use App\Http\Requests\StoreVaccineRequest;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class StoreVaccineRequestTest extends TestCase
{
    #[Test]
    public function it_has_the_correct_rules(): void
    {
        $request = new StoreVaccineRequest;

        $rules = [
            'name' => ['required', 'string'],
            'batch' => ['required', 'string'],
            'expiration_date' => ['required', 'string'],
        ];

        $this->assertEquals($rules, $request->rules());
    }

    #[Test]
    public function it_authorizes_every_request(): void
    {
        $request = new StoreVaccineRequest;

        $this->assertEquals(true, $request->authorize());
    }
}
