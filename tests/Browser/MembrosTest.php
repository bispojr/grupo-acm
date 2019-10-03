<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class MembrosTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     * @group membros
     */
    public function testCriar()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/membros/criar')
                    ->type('enderecoEmail','teste@teste.com')
                    ->press('Criar')
                    ->screenshot('telamembros')
                    ->assertSee('Membro criado com sucesso!');

        });
    }
}
