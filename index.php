<?php
session_start();

require_once($_SERVER["DOCUMENT_ROOT"] . "/controller/Api.php");
$archivo_csv = 'dataset/challenge_dataset.csv';


if (!file_exists($archivo_csv) || !is_readable($archivo_csv)) {
    die("El archivo no existe o no se puede leer.");
}

$datos = [];

$api = new Api();
$airport = $api->getAirports();

if (($handle = fopen($archivo_csv, 'r')) !== FALSE) {
    $encabezados = fgetcsv($handle, 1000, ',');
    while (($fila = fgetcsv($handle, 1000, ',')) !== FALSE) {
        $data = array_combine($encabezados, $fila);

        $response = $api->service($data);
        echo $api->pretty($response, $data);
    }

    fclose($handle);
}

$api->close();
