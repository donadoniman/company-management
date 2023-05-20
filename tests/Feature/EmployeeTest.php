<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     */
    public function testCanCreateEmployee()
    {
        // Create an authenticated user
        $user = User::factory()->create();
        $company = Company::factory()->create();

        $response = $this->actingAs($user)->post('/employees', [
            'first_name' => 'Test Firstname',
            'last_name' => 'Test Lastname',
            'company_id' => $company->id,
            'email' => 'test@example.com',
            'phone' => '123456789'
        ]);

        $response->assertStatus(200);

        /*$this->assertDatabaseHas('employees', [
            'first_name' => 'Test Firstname',
            'last_name' => 'Test Lastname',
            'company_id' => 1,
            'email' => 'test@example.com',
            'phone' => '123456789'
        ]);*/
    }

    public function testCanUpdateEmployee()
    {
        // Create an authenticated user
        $user = User::factory()->create();
        $company = Company::factory()->create();
        $employee = Employee::factory()->create();

        $response = $this->actingAs($user)->put('/employees/'.$employee->id, [
            'first_name' => 'Updated Firstname',
            'last_name' => 'Updated Lastname',
            'company_id' => $company->id,
            'email' => 'test@Updated.com',
            'phone' => '1234567890'
        ]);

        $response->assertStatus(200);
    }

    public function testCanDeleteEmployee()
    {
        // Create an authenticated user
        $user = User::factory()->create();
        $employee = Employee::factory()->create();

        $response = $this->actingAs($user)->delete('/employees/'.$employee->id);

        $response->assertStatus(200);
    }
}
