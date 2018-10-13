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
            case "membros":
                return self::valoresMembros();
            case "agenda":
                return self::valoresAgenda();
            case "fale-conosco":
                return self::valoresFaleConosco();
            case "recursos":
                return self::valoresRecursos();
        }
    }
    private static function valoresIndex()
    {
        $dados["titulo"] = 'Principal';
        $dados["view"] = 'principal.index';
        
        return $dados;
    }
    private static function valoresSobre()
    {
        $dados["titulo"] = 'Sobre nós...';
        $dados["view"] = 'principal.sobre';
        
        return $dados;
    }
    private static function valoresMembros()
    {
        $dados["titulo"] = 'Membros';
        $dados["view"] = 'principal.membros';
        
        return $dados;
    }
    private static function valoresAgenda()
    {
        $dados["titulo"] = 'Agenda';
        $dados["view"] = 'principal.agenda';
        
        return $dados;
    }
    private static function valoresRecursos()
    {
        $dados["titulo"] = 'Recursos';
        $dados["view"] = 'principal.recursos';
        
        return $dados;
    }
    private static function valoresFaleConosco()
    {
        $dados["titulo"] = 'Fale Conosco';
        $dados["view"] = 'principal.fale-conosco';
        
        return $dados;
    }
}
