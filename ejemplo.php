<?php 

// Enviar el documento al navegador para la descarga
header('Content-Disposition: attachment; filename=documento-final.docx');
readfile('documento-final.docx');
?>