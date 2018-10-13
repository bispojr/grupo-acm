<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificados extends Model
{
    public static function valores($pagina)
    {
        switch($pagina){
            case "buscar":
                return self::valoresBuscar();
            case "validar":
                return self::valoresValidar();
        }
    }
    private static function valoresBuscar()
    {
        $dados["titulo"] = 'Buscar certificados';
        $dados["view"] = 'certificados.buscar';
        
        return $dados;
    }
    private static function valoresValidar()
    {
        $dados["titulo"] = 'Validar certificados';
        $dados["view"] = 'certificados.validar';
        
        return $dados;
    }
}
