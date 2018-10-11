<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CertificadosController extends Controller
{
    public function index()
    {
        $pdf = new \setasign\Fpdi\Fpdi();
        
        $pdf->setSourceFile(base_path('data/certificado-modelo-site.pdf'));
        $tplIdx = $pdf->importPage(1, '/MediaBox');
        
        $pdf->AddPage('L');        
        $pdf->useTemplate($tplIdx);
        
        //$pdf->AddFont('LiberationSans', '', base_path('data/fonts/liberation.php'));
        //$pdf->AddFont('LiberationSans-Bold', '', 'liberationb.php');
        
        $pdf->SetXY(23,93);
        
        //$pdf->SetFont('LiberationSans', '', 14);Arial
        $pdf->SetFont('Helvetica', '', 18);
        $str = 'O Jataí ACM SIGCSE Chapter confere, para os devidos fins, que';
        //$str .= mb_strtoupper($this->getName());
        /*$str .= mb_strtoupper("João Canabrava da Silva");
        
        //if ($this->getType() == 1) {
        if (true) {
            $str .= ' participou do "II WORKSHOP E II MOSTRA DE TRABALHOS: '
                    . 'Atualidades e Perspectivas para a Cultura do Milho" '
                    . 'realizado nos dias 20 e 21 de novembro de 2014 pelo '
                    . 'Programa de Pós-Graduação em Agronomia da Universidade '
                    . 'Federal de Goiás - Regional Jataí, perfazendo carga '
                    . 'horária de 16 horas.';
        }
        else {
            $str .= ' foi integrante da comissão organizadora do "II WORKSHOP '
                    . 'E II MOSTRA DE TRABALHOS: Atualidades e Perspectivas '
                    . 'para a Cultura do Milho" realizado nos dias 20 e 21 '
                    . 'de novembro de 2014 pelo Programa de Pós-Graduação '
                    . 'em Agronomia da Universidade Federal de Goiás - '
                    . 'Regional Jataí, perfazendo carga horária de 50 horas.';
        }
        */
        $str = utf8_decode($str);
        $pdf->MultiCell(220, 7.5, $str, 0, 'J', 0);
        /*
        $pdf->SetXY(188,125);
        //setlocale(LC_TIME, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        $str = getdate();
        $str = 'Jataí, ' . $str['mday'] . ' de ' . $str['month'] . ' de ' . $str['year'] . '.';
        
        $str = utf8_decode($str);
        $pdf->MultiCell(220, 7.5, $str, 0, 'J', 0);
        
        //$pdf->SetFont('LiberationSans', '', 10);
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetXY(38,138);
        $str = 'Código do certificado: ';
        $str = utf8_decode($str);
        $pdf->MultiCell(220, 7.5, $str, 0, 'J', 0);
        
        //$pdf->SetFont('LiberationSans', '', 12);
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetXY(73,138);
        //$str = hash('crc32b', $this->getId());
        
        //$str = base64_encode(dechex($this->getId()));
        $str = base64_encode(dechex("XyZ-123"));
        $str = utf8_decode($str);
        $pdf->MultiCell(220, 7.5, $str, 0, 'J', 0);
        
        //$pdf->SetFont('LiberationSans', '', 8);
        $pdf->SetFont('Arial', '', 8);
        $pdf->SetXY(38,144);
        $str = 'A autenticidade do certificado pode ser verificada em: http://www.certificado.com.br';
        $str = utf8_decode($str);
        $pdf->MultiCell(70, 4, $str, 0, 'J', 0);*/
        
        $pdf->Output();
        
        exit();
    }
}
