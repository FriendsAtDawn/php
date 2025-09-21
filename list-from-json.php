<?php
// URL del JSON con la lista
$jsonUrl = 'https://mundo.xo.je/json/dir.json';

// Leer JSON desde URL
$jsonContent = @file_get_contents($jsonUrl);
if ($jsonContent === false) {
    die("Error: Could not retrieve JSON from $jsonUrl.\n");
}

$fileNames = json_decode($jsonContent, true); // decode as associative array
if (!is_array($fileNames)) {
    die("Error: Invalid JSON structure.\n");
}

$html = "<!DOCTYPE html><html><head><title>Listado PDF</title></head><body>\n";

foreach ($fileNames as $file) {
    $url = 'https://mundo.xo.je/' . $file;
    $html .= "<h3>$file</h3>";
    $html .= "<iframe src=\"$url\" width=\"600\" height=\"400\"></iframe><br><br>\n";
}

$html .= "</body></html>";

file_put_contents('index.html', $html);
echo "index.html generado correctamente desde JSON.\n";
