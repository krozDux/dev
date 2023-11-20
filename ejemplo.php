<?php 
require_once 'vendor/autoload.php';

use PhpOffice\PhpWord\TemplateProcessor;

// Ruta a la plantilla de Word
$templateProcessor = new TemplateProcessor('ruta/a/tu/plantilla.docx');

// Recibir nombre y apellido por algún método, por ejemplo, POST
$nombre = 'hola';
$apellido = 'hola';

// Reemplazar los marcadores de posición en la plantilla
$templateProcessor->setValue('nombre', $nombre);
$templateProcessor->setValue('apellido', $apellido);

// Guardar el documento resultante
$templateProcessor->saveAs('documento-final.docx');

// Enviar el documento al navegador para la descarga
header('Content-Disposition: attachment; filename=documento-final.docx');
readfile('documento-final.docx');
?>