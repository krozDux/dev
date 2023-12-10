<?php
require_once 'vendor/autoload.php';

use PhpOffice\PhpWord\TemplateProcessor;

try {
    // Ruta a la plantilla de Word
    $templateProcessor = new TemplateProcessor('nombre.docx');
    $idContrato = $_GET['idContrato'];
    $consulta = "SELECT contratos.id,usuarios.nombres,usuarios.apellidos,usuarios.rol,contratos.fechaInicio,contratos.fechaFin,contratos.observacion,contratos.recomendacion,contratos.idUsuario FROM usuarios INNER JOIN contratos 
    ON usuarios.id = contratos.idUsuario WHERE contratos.fechaInicio IS NOT NULL AND contratos.fechaFin IS NOT NULL AND id = '$idContrato' ORDER BY contratos.id DESC;";
    $resultado = mysqli_query($con, $consulta);
    // Recibir nombre y apellido por algún método, por ejemplo, POST
    if ($fila = mysqli_fetch_assoc($resultado)) {
        $nombre = $fila['nombres'];
        $apellido = $fila['apellidos'];
    } 
    // Reemplazar los marcadores de posición en la plantilla
    $templateProcessor->setValue('nombre', $nombre);
    $templateProcessor->setValue('apellido', $apellido);

    // Guardar el documento resultante
    $documentPath = 'documento-final.docx';
    $templateProcessor->saveAs($documentPath);

    // Enviar el documento al navegador para la descarga
    header('Content-Disposition: attachment; filename=' . basename($documentPath));
    header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
    header('Content-Length: ' . filesize($documentPath));
    header('Cache-Control: max-age=0');
    readfile($documentPath);
    exit;
    header("location: index.php");
} catch (Exception $e) {
    // Manejo de la excepción
    echo 'Error: ' . $e->getMessage();
}
?>