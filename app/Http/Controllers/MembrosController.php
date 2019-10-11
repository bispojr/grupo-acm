<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Membros as Membros;

class MembrosController extends Controller
{


    public function todos()
    {
        //return 'User '.$id;
        $dados = Membros::valores("todos");
        return view('esqueleto', $dados );

        
    }

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
        $foto_url = $request->input('foto_url');

        $membro = new Membros;
        $membro->nome = $nome;
        $membro->email = $email;
        $membro->cpf = $cpf;
        $membro->descricao = $descricao;
        $membro->foto_url = $foto_url;
        $res = $membro->save();

        var_dump($res);

        echo 'Membro criado com sucesso!';
    }



}
