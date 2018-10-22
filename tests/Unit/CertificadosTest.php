<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Hash;

use App\Certificados as Certificados;
use App\User as User;
use App\Evento as Evento;

class CertificadosTest extends TestCase
{
    use DatabaseMigrations;
    
    private $user;
    private $evento;
    
    public function setUp()
    {
        parent::setUp();

        $this->runDatabaseMigrations();
        
        $this->user = new User;
        $this->user->nome = "Esdras";
        $this->user->email = "esdraspiano@gmail.com";
        $this->user->cpf = "000000000-00";
        $this->user->cpf = Hash::make("senha");
        $this->user->save();
        
        $this->evento = new Evento;
        $this->evento->titulo = "Concurso de sopa de letrinhas";
        $this->evento->palestrante = "Aurélio Buarque de Holanda";
        $this->evento->local = "Universidade Federal de Jataí";
        $this->evento->data_hora = "2018/10/22 20:00:00";
        $this->evento->save();
    }
    public function testInsercaoSimples()
    {        
        $certificado = new Certificados;
        $certificado->user_id = $this->user->id;
        $certificado->evento_id = $this->evento->id;
        $certificado->tipo_participacao = "participante";
        $certificado->save();
        
        $this->assertDatabaseHas('certificado', [
            'tipo_participacao' => 'participante',
            'user_id' => $this->user->id,
            'evento_id' => $this->evento->id
        ]);
    }
}
