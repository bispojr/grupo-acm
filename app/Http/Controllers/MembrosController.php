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


    public function editar($id)
    {
        $dados = Membros::valores("editar");
        $dados["membro"] = Membros::find($id);

        return view('esqueleto', $dados);
    }

    public function criar()
    {
        $dados = Membros::valores("criar");
        return view('esqueleto', $dados);
    }

    public function excluir($id)
    {
        $dados = Membros::valores("excluir");
        $dados["membro"] = Membros::find($id); 
                   
        return view('esqueleto', $dados);
    }

    public function exibir($id)
    {
        $dados = Membros::valores("exibir");
        $dados["membro"] = Membros::find($id); 
                   
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

    public function editarMembro(Request $request, $id)
    {
        $dados["membro"] = $request->all();
        $dados["membro"] = Membros::where('id', $id)->first();

        #$update = $dados->update($dados);

        if( $dados != null ){

            $dados["membro"]->update();

            return redirect()->route('membros.todos')->with(['message'=> 'Successfully update!!']);

        }
        else
            return 'falho na atualização';
        
    }

    public function excluirMembro(Request $request)
    {

    }



}
