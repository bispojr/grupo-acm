<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membros extends Model
{

    protected $table = 'membros';

    public static function valores($pagina, $id=null)
    {
        switch($pagina){
            case "todos":
                return self::valoresTodos();
                break;
            case "editar":
                return self::valoresEditar($id);
                break;
            case "criar":
                return self::valoresCriar();
                break;
            case "exibir":
                return self::valoresExibir($id);
                break;
            case "excluir":
                return self::valoresExcluir($id);
                break;           
        }
    }

    private static function valoresTodos()
    {
        $dados["titulo"] = 'Membros';
        $dados["view"] = 'membros.todos';
        $dados["membros"] = self::all();

        return $dados;
    }

    private static function valoresExibir($id)
    {
        $dados["titulo"] = 'Membros';
        $dados["view"] = 'membros.exibir';

        $dados["membros"] = Membros::where('id', $id)->get();

        return $dados;
    }

    private static function valoresEditar($id)
    {
        $dados["titulo"] = 'Editar membros';
        $dados["view"] = 'membros.editar';

        $dados["membros"] = Membros::where('id', $id)->get();

        return $dados;
    }

    private static function valoresCriar()
    {
        $dados["titulo"] = 'Criar membros';
        $dados["view"] = 'membros.criar';

        return $dados;
    }

    private static function valoresExcluir($id)
    {
        $dados["titulo"] = 'Excluir membros';
        $dados["view"] = 'membros.excluir';

        $dados["membros"] = Membros::where('id', $id)->get();

        return $dados;
    }

}
