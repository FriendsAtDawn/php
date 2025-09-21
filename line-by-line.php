<?php
$archivo_lista = 'dix.txt'; // Archivo con lista de PDFs
$archivo_salida = 'index.html'; // Archivo HTML que se generará

// Abrir archivo lista para lectura
$handle = fopen($archivo_lista, 'r');
if (!$handle) {
    die("No se pudo abrir el archivo $archivo_lista");
}

// Abrir archivo html para escritura
$html_file = fopen($archivo_salida, 'w');
if (!$html_file) {
    fclose($handle);
    die("No se pudo crear el archivo $archivo_salida");
}

// Escribir estructura inicial HTML
fwrite($html_file, "<!DOCTYPE html>\n<html>\n<head><title>Lista de PDFs</title></head>\n<body>\n");

while (($linea = fgets($handle)) !== false) {
    $linea = trim($linea);
    if ($linea === '') continue;

    $url_pdf = "https://mundo.xo.je/$linea"; // Cambia al dominio real y ruta

    // Escribir cada entrada en HTML
    fwrite($html_file, "<h3>$linea</h3>\n");
    fwrite($html_file, "<iframe src=\"$url_pdf\" width=\"600\" height=\"400\"></iframe>\n<br><br>\n");
}

// Cerrar etiquetas HTML y archivos
fwrite($html_file, "</body>\n</html>");
fclose($handle);
fclose($html_file);

echo "Archivo $archivo_salida generado correctamente.\n";
