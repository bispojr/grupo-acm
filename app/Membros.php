<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membros extends Model
{

    protected $table = 'membros';

    public static function valores($pagina)
    {
        switch($pagina){
            case "editar":
                return self::valoresEditar();
            case "criar":
                return self::valoresCriar();
            case "excluir":
                return self::valoresExcluir();             
        }
    }

    private static function valoresEditar()
    {
        $dados["titulo"] = 'Editar membros';
        $dados["view"] = 'membros.editar';

        return $dados;
    }

    private static function valoresCriar()
    {
        $dados["titulo"] = 'Criar membros';
        $dados["view"] = 'membros.criar';

        return $dados;
    }

    private static function valoresExcluir()
    {
        $dados["titulo"] = 'Excluir membros';
        $dados["view"] = 'membros.excluir';

        return $dados;
    }

}
