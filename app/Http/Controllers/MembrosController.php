<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Membros as Membros;

class MembrosController extends Controller
{

    public function editar()
    {
        $dados = Membros::valores("editar");
        return view('esqueleto', $dados);
    }

    public function criar()
    {
        $dados = Membros::valores("criar");
        return view('esqueleto', $dados);
    }

    public function excluir()
    {
        $dados = Membros::valores("excluir");
        return view('esqueleto', $dados);
    }

    public function criarMembro(Request $request)
    {
        $email = $request->input('email');
        $nome = $request->input('nome');
        $cpf = $request->input('cpf');
        $descricao = $request->input('descricao');

        $membro = new Membros;
        $membro->nome = $nome;
        $membro->save();

        echo 'Membro criado com sucesso!';
    }
}
