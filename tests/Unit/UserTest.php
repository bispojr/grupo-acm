<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Hash;

use App\User as User;

class UserTest extends TestCase
{
    use DatabaseMigrations;
    
    public function setUp()
    {
        parent::setUp();

        $this->runDatabaseMigrations();
    }
    public function testExample()
    {        
        $user = new User;
        $user->nome = "Esdras";
        $user->email = "esdraspiano@gmail.com";
        $user->cpf = "000000000-00";
        $user->password = Hash::make("senha");
        $user->save();
        
        $this->assertDatabaseHas('users', [
            'email' => 'esdraspiano@gmail.com'
        ]);
    }
}
