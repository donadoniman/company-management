<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     */
    public function testCanCreateCompany()
    {
        // Create an authenticated user
        $user = User::factory()->create();

        Storage::fake('public/logos');

        $logoFile = UploadedFile::fake()->image('logo.jpg');

        $response = $this->actingAs($user)->post('/companies', [
            'name' => 'Test Company',
            'email' => 'test@example.com',
            'logo' => $logoFile,
            'website' => 'http://www.example.com'
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('companies', [
            'name' => 'Test Company',
            'email' => 'test@example.com',
            'website' => 'http://www.example.com'
        ]);

        /*$this->assertDatabaseHas('companies', [
            'name' => 'Test Company',
            'email' => 'test@example.com',
            'website' => 'http://www.example.com',
        ]);

        $this->assertTrue(Storage::disk('public/logos')->exists($logoFile->hashName()));*/
    }

    public function testCanUpdateCompany()
    {
        // Create an authenticated user
        $user = User::factory()->create();

        $company = Company::factory()->create();

        $response = $this->actingAs($user)->put('/companies/'.$company->id, [
            'name' => 'Updated Company',
            'email' => 'updated@example.com',
            'website' => 'http://www.updated.com',
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('companies', [
            'id' => $company->id,
            'name' => 'Updated Company',
            'email' => 'updated@example.com',
            'website' => 'http://www.updated.com',
        ]);
    }

    public function testCanDeleteCompany()
    {
        // Create an authenticated user
        $user = User::factory()->create();

        $company = Company::factory()->create();

        $response = $this->actingAs($user)->delete('/companies/'.$company->id);

        $response->assertStatus(200);

        $this->assertDatabaseMissing('companies', [
            'id' => $company->id,
        ]);
    }
}
