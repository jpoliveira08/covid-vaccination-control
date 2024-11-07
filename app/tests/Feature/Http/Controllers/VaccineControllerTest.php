<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Vaccine;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class VaccineControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_creates_vaccine(): void
    {
        $this->withoutExceptionHandling();

        $response = $this
            ->followingRedirects()
            ->post(route('vaccine.store'), [
            'name' => 'Pfizer',
            'batch' => '72O627H',
            'expiration_date' => '2027-11-06'
        ]);

        $vaccine = Vaccine::first();
        $this->assertEquals(1, Vaccine::count());
        $this->assertEquals('Pfizer', $vaccine->name);
        $this->assertEquals('72O627H', $vaccine->batch);
        $this->assertEquals('2027-11-06', $vaccine->expiration_date);

        $response->assertSeeText('Pfizer');
        $this->assertEquals(route('vaccine.show', $vaccine), url()->current());
    }
}
