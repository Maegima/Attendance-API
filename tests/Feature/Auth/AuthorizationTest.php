<?php

namespace Tests\Feature\Auth;

use App\Models\Employee;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Database\Seeders\PermissionTableSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase, DatabaseMigrations;
    
    public function setUp() : void
    {
        parent::setUp();
        $this->runDatabaseMigrations();
        $this->seed(PermissionTableSeeder::class);
    }
    
    public function test_users_authoriaztion()
    {
        $user = Employee::factory()->create(['type' => 1, 'remember_token' => "123456"]);
        $response = $this->get('/api/attendances', ['Authorization' => 'Bearer 123456']);
        
        $response->assertStatus(200);
    }
}
