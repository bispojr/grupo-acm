<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PrincipalTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Jataí ACM SIGCSE Chapter');
        });
    }
    public function testSobre()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/sobre')
                    ->assertSee('Sobre o Jataí ACM SIGCSE Chapter');
        });
    }
    public function testMembros()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/membros')
                    ->assertSee('Membros');
        });
    }
    public function testAgenda()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/agenda')
                    ->assertSee('Agenda');
        });
    }
    public function testRecursos()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/recursos')
                    ->assertSee('Recursos');
        });
    }
    public function testFaleConosco()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/fale-conosco')
                    ->assertSee('Fale Conosco');
        });
    }
}
