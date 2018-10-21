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
    public function testMembros()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clicklink("Membros")
                    ->assertPathIs('/membros');
        });
    }
    public function testAgenda()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clicklink("Agenda")
                    ->assertPathIs('/agenda');
        });
    }
    public function testCertificadosBuscar()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clicklink("Certificados")
                    ->clickLink("Buscar")
                    ->assertPathIs('/certificados/buscar');
        });
    }
    public function testCertificadosValidar()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clicklink("Certificados")
                    ->clickLink("Validar")
                    ->assertPathIs('/certificados/validar');
        });
    }
    public function testRecursos()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clicklink("Recursos")
                    ->assertPathIs('/recursos');
        });
    }
    public function testFaleConosco()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clicklink("Fale Conosco")
                    ->assertPathIs('/fale-conosco');
        });
    }
}
