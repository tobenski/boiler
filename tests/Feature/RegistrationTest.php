<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register()
    {
        $response = $this->post('/register', [
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName,
            'company' => $this->faker->company,
            'cvr' => $this->faker->numberBetween(10000000, 99999999),
            'email' => $this->faker->companyEmail,
            'password' => 'password',
            'password_confirmation' => 'password',
            'phone' => $this->faker->numberBetween(10000000,99999999),
            'address' => $this->faker->streetAddress,
            'zip' => $this->faker->numberBetween(1000,9999),
            'city' => $this->faker->city,
            'country' => $this->faker->country,
        ]);
        $this->assertDatabaseCount('users', 1);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_only_first_new_user_is_admin()
    {
        $this->withoutExceptionHandling();

        $this->post('/register', [
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName,
            'company' => $this->faker->company,
            'cvr' => $this->faker->numberBetween(10000000, 99999999),
            'email' => $this->faker->companyEmail,
            'password' => 'password',
            'password_confirmation' => 'password',
            'phone' => $this->faker->numberBetween(10000000,99999999),
            'address' => $this->faker->streetAddress,
            'zip' => $this->faker->numberBetween(1000,9999),
            'city' => $this->faker->city,
            'country' => $this->faker->country,
        ]);
        $this->assertDatabaseCount('users', 1);

        $admin = User::first();

        $this->assertTrue($admin->hasRole('admin'));

        $this->post('/logout');

        $this->post('/register', [
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName,
            'company' => $this->faker->company,
            'cvr' => $this->faker->numberBetween(10000000, 99999999),
            'email' => $this->faker->companyEmail,
            'password' => 'password',
            'password_confirmation' => 'password',
            'phone' => $this->faker->numberBetween(10000000,99999999),
            'address' => $this->faker->streetAddress,
            'zip' => $this->faker->numberBetween(1000,9999),
            'city' => $this->faker->city,
            'country' => $this->faker->country,
        ]);

        $this->assertDatabaseCount('users', 2);

        $user = User::find(2);
        $this->assertNotTrue($user->hasRole('admin'));
    }
}
