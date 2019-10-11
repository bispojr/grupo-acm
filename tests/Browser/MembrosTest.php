<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Membros as Membros;

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

        $membro = Membros::where('email', 'teste@teste.com')->exists();

        var_dump($membro);

        $this->assertTrue($membro); 
    }

    /*
     Testes:
        - Listar 1 usuario, 3 usuarios e 5 usuarios, em cada um desses deve verificar: nome de cada um, email de cada um, id de cada um e se os links estão corretos.
        - Clicar no link, tem que ir na pagina correta de cada usuário
    */
}
