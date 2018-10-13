<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Principal as Principal;

class PrincipalController extends Controller
{
    public function index()
    {
        $dados = Principal::valores("index");
        return view('esqueleto', $dados);
    }
    public function sobre()
    {
        $dados = Principal::valores("sobre");
        return view('esqueleto', $dados);
    }
    public function quemSomos()
    {
        $dados = Principal::valores("quem-somos");
        return view('esqueleto', $dados);
    }
    public function agenda()
    {
        $dados = Principal::valores("agenda");
        return view('esqueleto', $dados);
    }
    public function recursos()
    {
        $dados = Principal::valores("recursos");
        return view('esqueleto', $dados);
    }
    public function faleConosco()
    {
        $dados = Principal::valores("fale-conosco");
        return view('esqueleto', $dados);
    }
}
