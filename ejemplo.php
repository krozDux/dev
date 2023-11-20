<?php 
require_once 'vendor/autoload.php';

use PhpOffice\PhpWord\TemplateProcessor;


// Enviar el documento al navegador para la descarga
header('Content-Disposition: attachment; filename=documento-final.docx');
readfile('documento-final.docx');
?>