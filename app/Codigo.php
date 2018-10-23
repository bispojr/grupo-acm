<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Codigo extends Model
{
    private static $usuarioZero = "ABB";
    private static $eventoZero = "XYY";
    
    public static function getUsuario($id)
    {
        $triplaID = self::idToTripla($id);
        
        $triplaCod = null;
        if($triplaID != null)
            $triplaCod = self::codToTripla(self::$usuarioZero);
        
        $soma = null;
        if($triplaCod != null)
            $soma = self::somaTripla($triplaID, $triplaCod);
        
        if($soma != null)
            return self::triplaToCod($soma);
        
        return null;
    }
    public static function codToNum($valor)
    {
        $val = ord($valor);
        
        if($val >= 65 && $val <= 90)    //A-Z
            return ($val - 65);
        if($val >= 48 && $val <= 57 )   //0-9
            return (($val - 48) + 26);
        
        return null;
    }
    public static function numToCod($val)
    {
        if($val >= 0 && $val <= 25)    //A-Z
            return chr($val + 65);
        if($val >= 26 && $val <= 35 )   //0-9
            return chr(($val - 26) + 48);
        return null;
    }
    public static function idToTripla($num)
    {
        $base = $num;
        $val3 = $base % 36;
        
        $base = intdiv($base, 36);
        $val2 =  $base %  36;
        
        $val1 = intdiv($base, 36);
        
        if($val1 > 36)
            return null;
        else
            return [$val1, $val2, $val3];
    }
    public static function triplaToCod($tripla)
    {
        $valor1 = self::numToCod($tripla[0]);
        if($valor1 == null) return null;
        
        $valor2 = self::numToCod($tripla[1]);
        if($valor2 == null) return null;
        
        $valor3 = self::numToCod($tripla[2]);
        if($valor3 == null) return null;
        
        return $valor1.$valor2.$valor3;
    }
    public static function codToTripla($codigo)
    {   
        $valor1 = self::codToNum($codigo[0]);
        if($valor1 === null) return null;
        
        $valor2 = self::codToNum($codigo[1]);
        if($valor2 === null) return null;
        
        $valor3 = self::codToNum($codigo[2]);
        if($valor3 === null) return null;
        
        return [$valor1, $valor2, $valor3];
    }
    public static function somaNum($a, $b, $vaiUm)
    {
        $soma = $a + $b + $vaiUm;
        
        if($soma > 35) 
            if($soma-36 > 35) return null;
            else return [$soma - 36, 1];
        
        return [$soma, 0];
    }
    public static function somaTripla($tripla1, $tripla2)
    {
        $resultado = self::somaNum($tripla1[2], $tripla2[2], 0);
        if($resultado == null) return null;
        $soma3 = $resultado[0];
        
        $resultado = self::somaNum($tripla1[1], $tripla2[1], $resultado[1]);
        if($resultado == null) return null;
        $soma2 = $resultado[0];
        
        $resultado = self::somaNum($tripla1[0], $tripla2[0], $resultado[1]);
        if($resultado == null) return null;
        if($resultado[1] == 1) return null;
        
        $soma1 = $resultado[0];
        
        return [$soma1, $soma2, $soma3];
        
    }
}