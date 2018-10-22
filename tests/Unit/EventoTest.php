<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use App\Evento as Evento;

class EventoTest extends TestCase
{
    use DatabaseMigrations;
    
    public function setUp()
    {
        parent::setUp();

        $this->runDatabaseMigrations();
    }
    public function testInsercaoSimples()
    {        
        $evento = new Evento;
        $evento->titulo = "Concurso de sopa de letrinhas";
        $evento->palestrante = "Aurélio Buarque de Holanda";
        $evento->local = "Universidade Federal de Jataí";
        $evento->data_hora = "2018/10/22 20:00:00";
        $evento->save();
        
        $this->assertDatabaseHas('evento', [
            'titulo' => 'Concurso de sopa de letrinhas',
            'data_hora' => "2018/10/22 20:00:00"
        ]);
    }
}
