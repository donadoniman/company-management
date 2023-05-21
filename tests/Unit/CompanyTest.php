<?php

namespace Tests\Unit;

use App\Models\Company;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * Test for creating a new company.
     *
     * @return void
     */
    public function testCreateCompany()
    {
        // Create an authenticated user
        $user = User::factory()->create();

        $logoFile = UploadedFile::fake()->image('logo.jpg', 100, 100);

        $data = [
            'name' => $this->faker->company,
            'email' => $this->faker->email,
            'logo' => $logoFile,
            'website' => $this->faker->url,
        ];

        $response = $this->actingAs($user)->post(route('companies.store'), $data);

        $response->assertStatus(302); // Check if the response is a redirect
        $response->assertRedirect(route('companies.index')); // Check if it redirects to the index page

        $this->assertDatabaseHas('companies', [
            'name' => $data['name'],
            'email' => $data['email']
        ]);
    }

    /**
     * Test for updating an existing company.
     *
     * @return void
     */
    public function testUpdateCompany()
    {
        // Create an authenticated user
        $user = User::factory()->create();

        $company = Company::factory()->create();

        $logoFile = UploadedFile::fake()->image('update_logo.jpg', 100, 100);

        $data = [
            'name' => $this->faker->company,
            'email' => $this->faker->email,
            'logo' => $logoFile,
            'website' => $this->faker->url,
        ];

        $response = $this->actingAs($user)->put(route('companies.update', $company->id), $data);

        $response->assertStatus(302); // Check if the response is a redirect
        $response->assertRedirect(route('companies.index')); // Check if it redirects to the index page

        $this->assertDatabaseHas('companies', [
            'id' => $company->id,
            'name' => $data['name'],
            'email' => $data['email']
        ]);
    }

    /**
     * Test for deleting a company.
     *
     * @return void
     */
    public function testDeleteCompany()
    {
        // Create an authenticated user
        $user = User::factory()->create();

        $company = Company::factory()->create();

        $response = $this->actingAs($user)->delete(route('companies.destroy', $company->id));

        $response->assertStatus(302); // Check if the response is a redirect
        $response->assertRedirect(route('companies.index')); // Check if it redirects to the index page

        $this->assertDatabaseMissing('companies', [
            'id' => $company->id,
        ]);
    }
}