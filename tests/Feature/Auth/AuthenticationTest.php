<?php

namespace Tests\Feature\Auth;

use App\Models\Employee;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Database\Seeders\PermissionTableSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\URL;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase, DatabaseMigrations;
    
    public function setUp() : void
    {
        parent::setUp();
        $this->runDatabaseMigrations();
        $this->seed(PermissionTableSeeder::class);
    }
    
    public function test_users_can_authenticate_using_the_login_address()
    {
        $user = Employee::factory()->create();
        $response = $this->post('/api/login', [
            'username' => $user->email,
            'password' => 'password',
        ]);
        $user->refresh();

        $this->assertTrue($response["token"] == $user->remember_token);
        $response->assertStatus(200);
    }
    
    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $user = Employee::factory()->create();
        $response = $this->post('/api/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);
        
        $this->assertTrue(URL::to('/api/unauthorized') == $response->baseResponse->original);
    }
}
