<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Car;
use App\Models\User;

class CarControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Crée un utilisateur pour les tests
        $this->user = User::factory()->create();
    }

    /** @test */
    public function it_can_list_all_cars()
    {
        $car = Car::factory()->create();

        // Authentifier l'utilisateur
        $response = $this->actingAs($this->user)->get(route('cars.index'));

        $response->assertStatus(200);
        $response->assertViewIs('cars.index');
        $response->assertViewHas('cars', function ($viewCars) use ($car) {
            return $viewCars->contains($car);
        });
    }

    /** @test */
    public function it_can_show_a_car()
    {
        $car = Car::factory()->create();

        // Authentifier l'utilisateur
        $response = $this->actingAs($this->user)->get(route('cars.show', $car->id));

        $response->assertStatus(200);
        $response->assertViewIs('cars.show');
        $response->assertViewHas('car', $car);
    }

    /** @test */
    public function it_can_show_the_create_form()
    {
        // Authentifier l'utilisateur
        $response = $this->actingAs($this->user)->get(route('cars.create'));

        $response->assertStatus(200);
        $response->assertViewIs('cars.create');
    }

    /** @test */
    public function it_can_create_a_car()
    {
        $carData = [
            'marque' => 'Toyota',
            'modele' => 'Corolla',
            'immat' => 'ABC1234', // 7 characters
            'num_serie' => '12345678901234567890123456789012345', // 35 characters
            'puissance_fiscale' => 10,
            'date_mise_circulation' => '2020-01-01'
        ];

        // Authentifier l'utilisateur
        $response = $this->actingAs($this->user)->post(route('cars.store'), $carData);

        $response->assertStatus(302);
        $response->assertRedirect(route('cars.index'));
        $this->assertDatabaseHas('cars', $carData);
    }

    /** @test */
    public function it_can_show_the_edit_form()
    {
        $car = Car::factory()->create();

        // Authentifier l'utilisateur
        $response = $this->actingAs($this->user)->get(route('cars.edit', $car->id));

        $response->assertStatus(200);
        $response->assertViewIs('cars.edit');
        $response->assertViewHas('car', $car);
    }

    /** @test */
    public function it_can_update_a_car()
    {
        $car = Car::factory()->create();

        $updatedCarData = [
            'marque' => 'Honda',
            'modele' => 'Civic',
            'immat' => 'DEF4567', // 7 characters
            'num_serie' => '98765432109876543210987654321098765', // 35 characters
            'puissance_fiscale' => 12,
            'date_mise_circulation' => '2021-02-01'
        ];

        // Authentifier l'utilisateur
        $response = $this->actingAs($this->user)->put(route('cars.update', $car->id), $updatedCarData);

        $response->assertStatus(302);
        $response->assertRedirect(route('cars.index'));
        $this->assertDatabaseHas('cars', $updatedCarData);
    }

    /** @test */
    public function it_can_delete_a_car()
    {
        $car = Car::factory()->create();

        // Authentifier l'utilisateur
        $response = $this->actingAs($this->user)->delete(route('cars.destroy', $car->id));

        $response->assertStatus(302);
        $response->assertRedirect(route('cars.index'));
        $this->assertDatabaseMissing('cars', ['id' => $car->id]);
    }
}
