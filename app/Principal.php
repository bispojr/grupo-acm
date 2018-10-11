<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Principal extends Model
{
    public static function valores($pagina)
    {
        switch($pagina){
            case "index":
                return self::valoresIndex();
            case "sobre":
                return self::valoresSobre();
        }
    }
    private static function valoresIndex()
    {
        $dados["titulo"] = 'Principal';
        $dados["view"] = 'principal';
        
        return $dados;
    }
    private static function valoresSobre()
    {
        $dados["titulo"] = 'Sobre nós...';
        $dados["view"] = 'sobre';
        
        return $dados;
    }
}
