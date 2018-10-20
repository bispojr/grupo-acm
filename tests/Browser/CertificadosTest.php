<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CertificadosTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testBuscar()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/certificados/buscar')
                    ->assertSee('Buscar');
        });
    }
    public function testValidar()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/certificados/validar')
                    ->assertSee('Validar');
        });
    }
}
