<?php

require __DIR__ . '/vendor/autoload.php';

use Dompdf\Dompdf;

$pdf = new Dompdf(['enable_remote' => true]);
$pdf->setPaper('A4');

ob_start();
require __DIR__ . '/template.php';
$pdf->loadHtml(ob_get_clean());
$pdf->render();
$pdf->stream('file.pdf',['Attachment' => false]);
