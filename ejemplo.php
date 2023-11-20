<?php
require_once 'vendor/autoload.php';

use PhpOffice\PhpWord\TemplateProcessor;

$templateProcessor = new TemplateProcessor('nombre.docx');

$nombre = 'hola'; // Debería ser $_POST['nombre'] en producción
$apellido = 'asd'; // Debería ser $_POST['apellido'] en producción

// Depuración: Verificar los valores antes de la sustitución
var_dump($nombre);
var_dump($apellido);

// Reemplazar los marcadores de posición en la plantilla
$templateProcessor->setValue('nombre', $nombre);
$templateProcessor->setValue('apellido', $apellido);

// Guardar el documento resultante
$documentPath = 'documento-final.docx';
$templateProcessor->saveAs($documentPath);

// Depuración: Verificar si el documento tiene los valores sustituidos
$templateProcessor = new TemplateProcessor($documentPath);
$text = $templateProcessor->getVariables();
var_dump($text);

// Enviar el documento al navegador para la descarga
header('Content-Disposition: attachment; filename=' . basename($documentPath));
header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
header('Content-Length: ' . filesize($documentPath));
header('Cache-Control: max-age=0');
readfile($documentPath);
?>