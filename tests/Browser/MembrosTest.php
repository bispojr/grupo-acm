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

    public function testCriarNome()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/membros/criar')
            ->type('email','usuario@gmail.com')
            ->type('nome', 'Julian Nandes')
            ->type('cpf', '3333322222')
            ->type('descricao', 'Novo teste')
            ->type('foto_url', 'foto')
            ->press('Criar')
            ->assertSee('Membro criado com sucesso!');
        });

        $membro = Membros::where('nome', 'Julian Nandes')->exists();

        $this->assertTrue($membro);
    }

    public function testMembros() {
        $this->browse(function (Browser $browser) {
            $browser->visit('membros')
            ->assertSee('Membros');
        
        });
    }

    public function testExibir() {
        $this->browse(function (Browser $browser) {
            $browser->visit('membros/exibir')
            ->assertSee('Exibir');
        
        });
    }

    public function testCriarBrowser() {
        $this->browse(function (Browser $browser) {
            $browser->visit('membros/criar')
            ->assertSee('Criar');
        
        });
    }

    public function testEditar() {
        $this->browse(function (Browser $browser) {
            $browser->visit('membros/editar')
            ->assertSee('Editar');
        
        });
    }


    /*
     Testes:
        - Listar 1 usuario, 3 usuarios e 5 usuarios, em cada um desses deve verificar: nome de cada um, email de cada um, id de cada um e se os links estão corretos.
        - Clicar no link, tem que ir na pagina correta de cada usuário
    */
}
