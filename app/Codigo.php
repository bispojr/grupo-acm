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
    private static function idToTripla($num)
    {
        $val3 = $num % 36;
        $val2 = intdiv($val3, 36) % 36;
        $val1 = intdiv($val2, 36);
        
        if($val1 > 36)
            return null;
        else
            return [$val1, $val2, $val3];
    }
    private static function triplaToCod($tripla)
    {
        $valor1 = self::numToCod($tripla[0]);
        $valor2 = self::numToCod($tripla[1]);
        $valor3 = self::numToCod($tripla[2]);
        
        return $valor1.$valor2.$valor3;
    }
    
    private static function codToTripla($codigo)
    {
        $valor1 = ord($codigo[0]);
        $valor2 = ord($codigo[1]);
        $valor3 = ord($codigo[2]);
        
        $valor1 = self::codToNum($valor1);
        $valor2 = self::codToNum($valor2);
        $valor3 = self::codToNum($valor3);
        
        return [$valor1, $valor2, $valor3];
    }
    private static function somaTripla($tripla1, $tripla2)
    {
        $val3 = $tripla1[2] + $tripla2[2];
        
        $estouro = 0;
        if($val3 >= 36){
            $estouro = 1;
            $val3 -= 36;
        }
        
        $val2 = $tripla1[1] + $tripla2[1] + $estouro;
        
        $estouro = 0;
        if($val2 >= 36){
            $estouro = 1;
            $val2 -= 36;
        }
        
        $val1 = $tripla1[0] + $tripla2[0] + $estouro;
        
        if($val1 >= 36)
            return null;
        else
            return [$val1, $val2, $val3];
        
    }
}