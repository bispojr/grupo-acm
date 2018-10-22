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
