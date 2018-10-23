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
    
    /*public function testPrimeiroCodigoUsuario()
    {
        $codigo = Codigo::getUsuario(1);
        
        $this->assertEquals("ABC", $codigo);
    }
    public function testDecimoCodigoUsuario()
    {
        $codigo = Codigo::getUsuario(10);
        
        $this->assertEquals("ABL", $codigo);
    }
    public function testCentesimoCodigoUsuario()
    {
        $codigo = Codigo::getUsuario(100);
        
        $this->assertEquals("AD3", $codigo);
    }
    public function testQuingentesimoCodigoUsuario()
    {
        $codigo = Codigo::getUsuario(500);
        
        $this->assertEquals("AO8", $codigo);
    }
    public function testMilesimoCodigoUsuario()
    {
        $codigo = Codigo::getUsuario(1000);
        
        $this->assertEquals("A23", $codigo);
    }
    public function test10milCodigoUsuario()
    {
        $codigo = Codigo::getUsuario(10000);
        
        $this->assertEquals("AO8", $codigo);
    }*/
}
