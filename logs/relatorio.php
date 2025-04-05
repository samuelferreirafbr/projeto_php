<?php

// Essa parte do código reporta erros caso aconteçam

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Foi preciso utilizar o caminho absoluto para que o aquivo pdf fosse baixado
// O caminho absoluto busca um arquivo especificando o local em que ele se encontra desde a raíz
// Neste caso, foi para encontrar o arquivo fpdf.php

$caminho_absoluto = __DIR__ . '/fpdf/fpdf.php';
if (file_exists($caminho_absoluto)) { require($caminho_absoluto);
} else {
    die('Erro: Arquivo fpdf.php não encontrado em ' . $caminho_absoluto);

}

class PDF extends FPDF {
    function Header() {
        $this->SetFont('Arial', 'B', 13);

        $this->Cell(0, 10, 'Relatório de Clientes', 0, 1, 'C');
        $this->Ln(10);
    }

    function Footer () {
    $this->SetY(-15);
    $this->SetFont('Arial', 'I', 8);
    $this->Cell(0, 10, 'Página ' . $this->PageNo(), 0, 0, 'C');

    }

}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
$pdf->SetFont('Arial', '', 12);

$pdf->Cell(0, 10, 'Nome: Felipe Pereira Souza', 0, 1);
$pdf->Cell(0, 10, 'Email: felipe@gmail.com', 0, 1);

$pdf->Output('D', 'relatorio.pdf');