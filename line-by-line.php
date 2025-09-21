<?php
$archivo_lista = 'dix.txt'; // Archivo dentro del repo con la lista

// Abrir el archivo para lectura
$handle = fopen($archivo_lista, 'r');
if (!$handle) {
    die("No se pudo abrir el archivo $archivo_lista");
}

echo "<!DOCTYPE html>\n<html>\n<head><title>Lista de PDFs</title></head>\n<body>\n";

while (($linea = fgets($handle)) !== false) {
    $linea = trim($linea);
    if ($linea === '') continue; // Ignora líneas vacías

    // Aquí pon la URL base donde esté alojado el PDF
    $url_pdf = "https://mundo.xo.je/$linea";

    echo "<h3>$linea</h3>\n";
    echo "<iframe src=\"$url_pdf\" width=\"600\" height=\"400\"></iframe>\n<br><br>\n";
}

echo "</body>\n</html>";

fclose($handle);
?>
