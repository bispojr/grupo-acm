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
}
