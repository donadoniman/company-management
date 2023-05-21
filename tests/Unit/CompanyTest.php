namespace Tests\Unit;

use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyControllerTest extends TestCase
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

        Storage::fake('public/logos');

        $logoFile = UploadedFile::fake()->image('logo.jpg');
        $data = [
            'name' => 'Test Company',
            'email' => 'test@example.com',
            'logo' => $logoFile,
            'website' => 'http://www.example.com'
        ];

        $response = $this->actingAs($user)->post(route('companies.store'), $data);

        $response->assertStatus(302); // Check if the response is a redirect
        $response->assertRedirect(route('companies.index')); // Check if it redirects to the index page

        $this->assertDatabaseHas('companies', [
            'name' => $data['name'],
            'email' => $data['email'],
            'logo' => $data['logo'],
            'website' => $data['website'],
        ]);
    }

    /**
     * Test for updating an existing company.
     *
     * @return void
     */
    public function testUpdateCompany()
    {
        $company = Company::factory()->create();

        $data = [
            'name' => $this->faker->company,
            'email' => $this->faker->email,
            'logo' => 'updated_logo.png',
            'website' => $this->faker->url,
        ];

        $response = $this->put(route('companies.update', $company->id), $data);

        $response->assertStatus(302); // Check if the response is a redirect
        $response->assertRedirect(route('companies.index')); // Check if it redirects to the index page

        $this->assertDatabaseHas('companies', [
            'id' => $company->id,
            'name' => $data['name'],
            'email' => $data['email'],
            'logo' => $data['logo'],
            'website' => $data['website'],
        ]);
    }

    /**
     * Test for deleting a company.
     *
     * @return void
     */
    public function testDeleteCompany()
    {
        $company = Company::factory()->create();

        $response = $this->delete(route('companies.destroy', $company->id));

        $response->assertStatus(302); // Check if the response is a redirect
        $response->assertRedirect(route('companies.index')); // Check if it redirects to the index page

        $this->assertDeleted('companies', [
            'id' => $company->id,
        ]);
    }
}