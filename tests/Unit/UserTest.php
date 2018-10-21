<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan as Artisan;

use App\User as User;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        Artisan::call('migrate');
        
        $user = new User;
        $user->nome = "Esdras";
        $user->email = "esdraspiano@gmail.com";
        $user->cpf = "000000000-00";
        $user->save();
        
        $this->assertDatabaseHas('users', [
            'email' => 'esdraspiano@gmail.com'
        ]);
        
        Artisan::call('migrate:rollback');
    }
}
