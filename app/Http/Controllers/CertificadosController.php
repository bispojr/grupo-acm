<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Certificados as Certificados;

class CertificadosController extends Controller
{
    public function index()
    {
        $pdf = new \setasign\Fpdi\Fpdi();
        
        $pdf->setSourceFile(base_path('data/certificado-modelo-site.pdf'));
        $tplIdx = $pdf->importPage(1, '/MediaBox');
        $pdf->SetAutoPageBreak(false);
        
        $pdf->AddPage('L');        
        $pdf->useTemplate($tplIdx);
        
        $pdf->SetXY(23,93);
        $pdf->SetFont('Helvetica', '', 18);
        $str = 'O Jataí ACM SIGCSE Chapter confere, para os devidos fins, que';
        $str = utf8_decode($str);
        $pdf->MultiCell(210, 7.5, $str, 0, 'J', 0);
        
        $pdf->SetXY(63,104);
        $pdf->SetFont('Helvetica', 'B', 22);
        $str = "João Canabrava da Silva";
        $str = utf8_decode($str);
        $pdf->MultiCell(210, 7.5, $str, 0, 'L', 0);
        
        $pdf->SetXY(23,115);
        $pdf->SetFont('Helvetica', '', 18);
        $str = 'participou do seminário '
            . '"Comparison between Pseudocode Usage and Visual Programming with Scratch in Programming Teaching" '
            . 'realizado no dia 26 de setembro de 2018 '
            . 'na Universidade Federal de Goiás (Regional Jataí).';
        $str = utf8_decode($str);
        $pdf->MultiCell(210, 7.5, $str, 0, 'J', 0);
        
        $pdf->SetXY(23,-14);
        $pdf->SetFont('Helvetica', '', 9);
        $str = 'A autenticação deste certificado pode ser verificada '
            . 'através do endereço certificados.acmjatai.bispojr.com '
            . 'pelo código XXXX.';
        $str = utf8_decode($str);
        $pdf->MultiCell(230, 7.5, $str, 0, 'L', 0);
        
        $pdf->SetXY(229,-14);
        $pdf->SetFont('Helvetica', '', 9);
        $str = 'Carga Horária: 1h';
        $str = utf8_decode($str);
        $pdf->MultiCell(40, 7.5, $str, 0, 'L', 0);
        
        $pdf->Output();
        
        exit();
    }
    public function buscar()
    {
        $dados = Certificados::valores("buscar");
        return view('esqueleto', $dados);
    }
    public function buscarComCPF(Request $request)
    {
        $cpf = $request->input('cpf');
    }
    public function validar()
    {
        $dados = Certificados::valores("validar");
        return view('esqueleto', $dados);
    }
    public function validarComCodigo(Request $request)
    {
        $codigo = $request->input('codigo');
    }
}
