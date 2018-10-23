<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Codigo as Codigo;

class CodigoTest extends TestCase
{
    //======================
    //numToCod
    //======================
    public function testNumToCod01()
    {
        $cod = Codigo::numToCod(1);
        
        $this->assertEquals("B", $cod);
    }
    public function testNumToCod20()
    {
        $cod = Codigo::numToCod(20);
        
        $this->assertEquals("U", $cod);
    }
    public function testNumToCod33()
    {
        $cod = Codigo::numToCod(33);
        
        $this->assertEquals("7", $cod);
    }
    public function testNumToCod57()
    {
        $cod = Codigo::numToCod(57);
        
        $this->assertEquals(null, $cod);
    }
    
    //======================
    //codToNum
    //======================
    public function testCodToNumB()
    {
        $cod = Codigo::codToNum("B");
        
        $this->assertEquals(1, $cod);
    }
    public function testCodToNumU()
    {
        $cod = Codigo::codToNum("U");
        
        $this->assertEquals(20, $cod);
    }
    public function testCodToNum7()
    {
        $cod = Codigo::codToNum("7");
        
        $this->assertEquals(33, $cod);
    }
    public function testCodToNum_a()
    {
        $cod = Codigo::codToNum("a");
        
        $this->assertEquals(null, $cod);
    }
    
    //======================
    //idToTripla
    //======================
    public function testIdToTripla01()
    {
        $tripla = Codigo::idToTripla(1);
        $esperado = [0,0,1];
        
        $this->assertEquals($esperado, $tripla);
    }
    public function testIdToTripla27()
    {
        $tripla = Codigo::idToTripla(27);
        $esperado = [0,0,27];
        
        $this->assertEquals($esperado, $tripla);
    }
    public function testIdToTripla42()
    {
        $tripla = Codigo::idToTripla(42);
        $esperado = [0,1,6];
        
        $this->assertEquals($esperado, $tripla);
    }
    public function testIdToTripla2000()
    {
        $tripla = Codigo::idToTripla(2000);
        $esperado = [1,19,20];
        
        $this->assertEquals($esperado, $tripla);
    }
    public function testIdToTripla60000()
    {
        $tripla = Codigo::idToTripla(60000);
        $esperado = null;
        
        $this->assertEquals($esperado, $tripla);
    }
    
    //======================
    //triplaToCod
    //======================
    public function testTriplaToCod01()
    {
        $tripla = [0,0,1];
        $cod = Codigo::triplaToCod($tripla);
        $esperado = "AAB";
        
        $this->assertEquals($esperado, $cod);
    }
    public function testTriplaToCod02()
    {
        $tripla = [0,0,27];
        $cod = Codigo::triplaToCod($tripla);
        $esperado = "AA1";
        
        $this->assertEquals($esperado, $cod);
    }
    public function testTriplaToCod03()
    {
        $tripla = [0,1,6];
        $cod = Codigo::triplaToCod($tripla);
        $esperado = "ABG";
        
        $this->assertEquals($esperado, $cod);
    }
    public function testTriplaToCod04()
    {
        $tripla = [1,19,20];
        $cod = Codigo::triplaToCod($tripla);
        $esperado = "BTU";
        
        $this->assertEquals($esperado, $cod);
    }
    public function testTriplaToCodErro()
    {
        $tripla = [1,42,20];
        $cod = Codigo::triplaToCod($tripla);
        $esperado = null;
        
        $this->assertEquals($esperado, $cod);
    }
    
    //======================
    //codToTripla
    //======================
    public function testCodToTripla01()
    {
        $cod = "AAB";
        $tripla = Codigo::codToTripla($cod);
        $esperado = [0,0,1];
        
        $this->assertEquals($esperado, $tripla);
    }
    public function testCodToTripla02()
    {
        $cod = "AA1";
        $tripla = Codigo::codToTripla($cod);
        $esperado = [0,0,27];
        
        $this->assertEquals($esperado, $tripla);
    }
    public function testCodToTripla03()
    {
        $cod = "ABG";
        $tripla = Codigo::codToTripla($cod);
        $esperado = [0,1,6];
        
        $this->assertEquals($esperado, $tripla);
    }
    public function testCodToTripla04()
    {
        $cod = "BTU";
        $tripla = Codigo::codToTripla($cod);
        $esperado = [1,19,20];
        
        $this->assertEquals($esperado, $tripla);
    }
    public function testCodToTriplaErro()
    {
        $cod = "BaU";
        $tripla = Codigo::codToTripla($cod);
        $esperado = null;
        
        $this->assertEquals($esperado, $tripla);
    }
    
    //======================
    //somaNum
    //======================
    public function testSomaNum01()
    {
        $a = 14;
        $b = 12;
        $vaiUm = 0;
        $soma = Codigo::somaNum($a, $b, $vaiUm);
        $esperado = [26,0];
        
        $this->assertEquals($esperado, $soma);
    }
    public function testSomaNum02()
    {
        $a = 14;
        $b = 12;
        $vaiUm = 1;
        $soma = Codigo::somaNum($a, $b, $vaiUm);
        $esperado = [27,0];
        
        $this->assertEquals($esperado, $soma);
    }
    public function testSomaNum03()
    {
        $a = 14;
        $b = 22;
        $vaiUm = 0;
        $soma = Codigo::somaNum($a, $b, $vaiUm);
        $esperado = [0,1];
        
        $this->assertEquals($esperado, $soma);
    }
    public function testSomaNum04()
    {
        $a = 14;
        $b = 22;
        $vaiUm = 1;
        $soma = Codigo::somaNum($a, $b, $vaiUm);
        $esperado = [1,1];
        
        $this->assertEquals($esperado, $soma);
    }
    public function testSomaNum05()
    {
        $a = 24;
        $b = 22;
        $vaiUm = 0;
        $soma = Codigo::somaNum($a, $b, $vaiUm);
        $esperado = [10,1];
        
        $this->assertEquals($esperado, $soma);
    }
    public function testSomaNumErro()
    {
        $a = 40;
        $b = 40;
        $vaiUm = 0;
        $soma = Codigo::somaNum($a, $b, $vaiUm);
        $esperado = null;
        
        $this->assertEquals($esperado, $soma);
    }
    
    //======================
    //somaTripla
    //======================
    public function testSomaTripla01()
    {
        $a = [0,0,1];
        $b = [0,0,1];
        $tripla = Codigo::somaTripla($a, $b);
        $esperado = [0,0,2];
        
        $this->assertEquals($esperado, $tripla);
    }
    public function testSomaTripla02()
    {
        $a = [0,0,12];
        $b = [0,0,15];
        $tripla = Codigo::somaTripla($a, $b);
        $esperado = [0,0,27];
        
        $this->assertEquals($esperado, $tripla);
    }
    public function testSomaTripla03()
    {
        $a = [0,0,32];
        $b = [0,0,15];
        $tripla = Codigo::somaTripla($a, $b);
        $esperado = [0,1,11];
        
        $this->assertEquals($esperado, $tripla);
    }
    public function testSomaTripla04()
    {
        $a = [0,14,32];
        $b = [0,20,15];
        $tripla = Codigo::somaTripla($a, $b);
        $esperado = [0,35,11];
        
        $this->assertEquals($esperado, $tripla);
    }
    public function testSomaTripla05()
    {
        $a = [0,24,32];
        $b = [0,20,15];
        $tripla = Codigo::somaTripla($a, $b);
        $esperado = [1,9,11];
        
        $this->assertEquals($esperado, $tripla);
    }
    public function testSomaTripla06()
    {
        $a = [10,24,32];
        $b = [5,25,15];
        $tripla = Codigo::somaTripla($a, $b);
        $esperado = [16,14,11];
        
        $this->assertEquals($esperado, $tripla);
    }
    public function testSomaTriplaErro()
    {
        $a = [20,24,32];
        $b = [25,25,15];
        $tripla = Codigo::somaTripla($a, $b);
        $esperado = null;
        
        $this->assertEquals($esperado, $tripla);
    }
    
    //======================
    //getUsuarioByID
    //======================
    public function testGetUsuarioByID1()
    {
        $codigo = Codigo::getUsuarioByID(1);
        
        $this->assertEquals("ABC", $codigo);
    }
    public function testGetUsuarioByID10()
    {
        $codigo = Codigo::getUsuarioByID(10);
        
        $this->assertEquals("ABL", $codigo);
    }
    public function testGetUsuarioByID100()
    {
        $codigo = Codigo::getUsuarioByID(100);
        
        $this->assertEquals("AD3", $codigo);
    }
    public function testGetUsuarioByID500()
    {
        $codigo = Codigo::getUsuarioByID(500);
        
        $this->assertEquals("AO7", $codigo);
    }
    public function testGetUsuarioByID1000()
    {
        $codigo = Codigo::getUsuarioByID(1000);
        
        $this->assertEquals("A23", $codigo);
    }
    public function testGetUsuarioByID10000()
    {
        $codigo = Codigo::getUsuarioByID(10000);
        
        $this->assertEquals("H03", $codigo);
    }
}
