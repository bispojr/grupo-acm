<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificados extends Model
{
    protected $table = 'certificado';
    
    public static function valores($pagina, $cpf=null)
    {
        switch($pagina){
            case "buscar":
                return self::valoresBuscar();
            case "validar":
                return self::valoresValidar();
            case "buscarComCPF":
                return self::valoresBuscarComCPF($cpf);
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
    private static function valoresBuscarComCPF($cpf)
    {
        $usuario = User::where("cpf", $cpf)->first();
        $dados["certificados"] = Certificados::where("user_id", $usuario->id);

        return $dados;
    }
}
