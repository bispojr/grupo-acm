<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;

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
        $this->user->cpf = "000.000.000-00";
        $this->user->password = Hash::make("senha");
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
    /**
     * @depends testInsercaoSimples
     */
    public function testBuscarComCPF01()
    {
        $certificado = new Certificados;
        $certificado->user_id = $this->user->id;
        $certificado->evento_id = $this->evento->id;
        $certificado->tipo_participacao = "participante";
        $certificado->save();

        $dados = Certificados::valores("buscarComCPF", '000.000.000-00');
        $certificado = $dados["certificados"];
        $certificado = $certificado->first();

        $this->assertEquals($this->user->id, $certificado->user_id);
        $this->assertEquals($this->evento->id, $certificado->evento_id);
    }
    public function testBuscarComCPF02()
    {
        $evento = new Evento;
        $evento->titulo = "Congresso de Caviar com Rapadura";
        $evento->palestrante = "Zé Lezin";
        $evento->local = "Instituto Federal de Jataí";
        $evento->data_hora = "2018/10/29 20:00:00";
        $evento->save();

        $certificado = new Certificados;
        $certificado->user_id = $this->user->id;
        $certificado->evento_id = $this->evento->id;
        $certificado->tipo_participacao = "participante";
        $certificado->save();

        $certificado2 = new Certificados;
        $certificado2->user_id = $this->user->id;
        $certificado2->evento_id = $evento->id;
        $certificado2->tipo_participacao = "participante";
        $certificado2->save();

        $dados = Certificados::valores("buscarComCPF", '000.000.000-00');
        $certificadoSaida = $dados["certificados"];

        $esperado[$certificado->id]["user_id"] = $this->user->id;
        $esperado[$certificado->id]["evento_id"] = $this->evento->id;
        $esperado[$certificado2->id]["user_id"] = $this->user->id;
        $esperado[$certificado2->id]["evento_id"] = $evento->id;

        $real = [];
        foreach ($certificadoSaida as $cert) {
            echo "Entrou ";
            $real[$cert->id]["user_id"] = $cert->user_id;
            $real[$cert->id]["evento_id"] = $cert->evento_id;
        }

        $this->assertEquals($esperado, $real);
    }
    public function testBuscarComCPF03()
    {
        $evento = new Evento;
        $evento->titulo = "Congresso de Caviar com Rapadura";
        $evento->palestrante = "Zé Lezin";
        $evento->local = "Instituto Federal de Jataí";
        $evento->data_hora = "2018/10/29 20:00:00";
        $evento->save();

        $evento2 = new Evento;
        $evento2->titulo = "Seminário da Fruta Madura";
        $evento2->palestrante = "Tiririca";
        $evento2->local = "SENAC Jataí";
        $evento2->data_hora = "2018/10/31 10:00:00";
        $evento2->save();

        $certificado = new Certificados;
        $certificado->user_id = $this->user->id;
        $certificado->evento_id = $this->evento->id;
        $certificado->tipo_participacao = "participante";
        $certificado->save();

        $certificado2 = new Certificados;
        $certificado2->user_id = $this->user->id;
        $certificado2->evento_id = $evento->id;
        $certificado2->tipo_participacao = "participante";
        $certificado2->save();

        $certificado3 = new Certificados;
        $certificado3->user_id = $this->user->id;
        $certificado3->evento_id = $evento2->id;
        $certificado3->tipo_participacao = "participante";
        $certificado3->save();

        $dados = Certificados::valores("buscarComCPF", '000.000.000-00');
        $certificadoSaida = $dados["certificados"];

        $esperado[$certificado->id]["user_id"] = $this->user->id;
        $esperado[$certificado->id]["evento_id"] = $this->evento->id;

        $esperado[$certificado2->id]["user_id"] = $this->user->id;
        $esperado[$certificado2->id]["evento_id"] = $evento->id;

        $esperado[$certificado3->id]["user_id"] = $this->user->id;
        $esperado[$certificado3->id]["evento_id"] = $evento2->id;

        $real = [];
        foreach ($certificadoSaida as $cert) {
            echo "Entrou ";
            $real[$cert->id]["user_id"] = $cert->user_id;
            $real[$cert->id]["evento_id"] = $cert->evento_id;
        }

        $this->assertEquals($esperado, $real);
    }
    public function testBuscarComCPFErro()
    {
        $this->expectException(ModelNotFoundException::class);

        $dados = Certificados::valores("buscarComCPF", '000.000.000-02');
    }
}
