<?php

namespace Tests\Unit;

use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * Test for creating a new company.
     *
     * @return void
     */
    public function testCreateEmployee()
    {
        // Create an authenticated user
        $user = User::factory()->create();
        $company = Company::factory()->create();

        $data = [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'company_id' => $company->id,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
        ];

        $response = $this->actingAs($user)->post(route('employees.store'), $data);

        $response->assertStatus(302); // Check if the response is a redirect
        $response->assertRedirect(route('employees.index')); // Check if it redirects to the index page

        $this->assertDatabaseHas('employees', [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'company_id' => $data['company_id'],
            'email' => $data['email']
        ]);
    }

    /**
     * Test for updating an existing company.
     *
     * @return void
     */
    public function testUpdateEmployee()
    {
        // Create an authenticated user
        $user = User::factory()->create();

        $company = Company::factory()->create();
        $employee = Employee::factory()->create();

        $data = [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'company_id' => $company->id,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
        ];

        $response = $this->actingAs($user)->put(route('employees.update', $employee->id), $data);

        $response->assertStatus(302); // Check if the response is a redirect
        $response->assertRedirect(route('employees.index')); // Check if it redirects to the index page

        $this->assertDatabaseHas('employees', [
            'id' => $employee->id,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'company_id' => $data['company_id'],
            'email' => $data['email']
        ]);
    }

    /**
     * Test for deleting a company.
     *
     * @return void
     */
    public function testDeleteEmployee()
    {
        // Create an authenticated user
        $user = User::factory()->create();

        $company = Company::factory()->create();
        $employee = Employee::factory()->create();

        $response = $this->actingAs($user)->delete(route('employees.destroy', $employee->id));

        $response->assertStatus(302); // Check if the response is a redirect
        $response->assertRedirect(route('employees.index')); // Check if it redirects to the index page

        $this->assertDatabaseMissing('employees', [
            'id' => $employee->id
        ]);
    }
}