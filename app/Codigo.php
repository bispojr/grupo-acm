<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Codigo extends Model
{
    private static $usuarioZero = "ABB";
    private static $eventoZero = "XYY";
    
    public static function getUsuarioByID($id)
    {
        $triplaID = self::idToTripla($id);
        
        $triplaBase = null;
        if($triplaID != null)
            $triplaBase = self::codToTripla(self::$usuarioZero);
        
        $soma = null;
        if($triplaBase != null)
            $soma = self::somaTripla($triplaID, $triplaBase);
        
        if($soma != null)
            return self::triplaToCod($soma);
        
        return null;
    }
    public static function getUsuarioByCod($cod)
    {
        $triplaCod = self::codToTripla($cod);
        
        $triplaBase = null;
        if($triplaCod != null)
            $triplaBase = self::codToTripla(self::$usuarioZero);
        
        $diff = null;
        if($triplaBase != null)
            $diff = self::diffTripla($triplaCod, $triplaBase);
        
        if($diff != null)
            return self::triplaToID($soma);
        
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
    public static function triplaToID($tripla)
    {
        $id = $tripla[0]*36 + $tripla[1];
        $id = $id*36 + $tripla[2];
        
        if($id > 46656) return null;
        
        return $id;
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
    public static function diffNum($a, $b, $menosUm)
    {
        $diff = $a - $b + $menosUm;
        
        if($diff < 0) 
            return [$diff + 36, -1];
        
        return [$diff, 0];
    }
    public static function diffTripla($tripla1, $tripla2)
    {
        $resultado = self::diffNum($tripla1[2], $tripla2[2], 0);
        $diff3 = $resultado[0];
        
        $resultado = self::diffNum($tripla1[1], $tripla2[1], $resultado[1]);
        $diff2 = $resultado[0];
        
        $resultado = self::diffNum($tripla1[0], $tripla2[0], $resultado[1]);
        if($resultado[1] == -1) return null;
        
        $diff1 = $resultado[0];
        
        return [$diff1, $diff2, $diff3];
        
    }
}