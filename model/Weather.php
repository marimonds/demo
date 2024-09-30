<?php
require_once($_SERVER["DOCUMENT_ROOT"] . '/model/Conexion.php');

class Weather
{

    private $conexion;
    private $accessToken = '5aa5e44b333a4237a08204346242909';

    function __construct()
    {
        $this->conexion = new Conexion();
    }

    function getClima()
    {

        $sql = "SELECT * FROM clima";
        $data = $this->conexion->getQuery($sql);
        return $data;
    }

    function serviceAPI($code, $lng, $lat)
    {

        try {
            $url = 'http://api.weatherapi.com/v1/forecast.json';
            $url .= '?' . http_build_query([
                'key' => $this->accessToken,
                'q' =>  $lat . "," . $lng,
            ]);

            $ch = curl_init($url);
            if ($ch === false) {
                throw new Exception('No se pudo inicializar cURL');
            }

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);
            if ($response === false) {
                $error = curl_error($ch);
                curl_close($ch);
                throw new Exception('Error en la solicitud cURL: ' . $error);
            }
            curl_close($ch);

            $clima = json_decode($response, true);
            if ($clima === null) {
                throw new Exception('Error al decodificar la respuesta JSON');
            } else {
                $tmp = $clima["forecast"]["forecastday"][0]["day"];
                $sql = "INSERT INTO clima (code, max, min)
                VALUES ('" . $code . "', '" . $tmp["maxtemp_c"] . "', '" . $tmp["mintemp_c"] . "');";
                $this->conexion->setQuery($sql);
                return (object)[
                    "code" => $code,
                    "max" => $tmp["maxtemp_c"],
                    "min" => $tmp["mintemp_c"]
                ];
            }
        } catch (Exception $e) {
            echo 'Excepción capturada: ' . $e->getMessage();
        }

        return  $tmp;
    }

    function close()
    {

        $this->conexion->close();
    }
}
