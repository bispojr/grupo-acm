<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class NavbarTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testPrincipal()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clicklink("Principal")
                    ->assertPathIs('/');
        });
    }
    public function testSobre()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clicklink("Sobre")
                    ->assertPathIs('/sobre');
        });
    }
}
