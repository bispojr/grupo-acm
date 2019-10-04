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
                    ->type('email','teste@teste.com')
                    ->type('nome', 'Rafael Andrade')
                    ->type('cpf', '33333333333')
                    ->type('descricao', 'ola mundo')
                    ->type('foto_url', 'foto')
                    ->press('Criar')
                    ->screenshot('telamembros')
                    ->assertSee('Membro criado com sucesso!');

        });
    }
}
