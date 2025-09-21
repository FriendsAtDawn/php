<?php
$base_url = 'https://repositorio.hstn.me/';
$file_names = ['98678.pdf','77878.pdf', '76778.pdf', '45789.pdf', '40571.pdf', '101234.pdf']; // Puedes agregar o generar esta lista

$html = "<!DOCTYPE html><html><head><title>Listado PDF</title><br /><link rel=\"stylesheet\" href=\"https://cdn.simplecss.org/simple.min.css\"></head><body>\n";
foreach ($file_names as $file) {
    $url = $base_url . $file;
    $html .= "<iframe src=\"$url\" id=\"$file\" width=\"600\" height=\"400\"></iframe><br><br>\n";
    $html .= "<h3>$file</h3>";
}
$html .= "</body></html>";

file_put_contents('index.html', $html);
echo "index.html generado correctamente.\n";
