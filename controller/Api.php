<?php
require_once($_SERVER["DOCUMENT_ROOT"] . '/model/Weather.php');

class Api
{
    private $weather;
    private $airport;

    function __construct()
    {
        $this->weather = new Weather();
        $this->airport =  $this->weather->getClima();
        $_SESSION["airport"] = $this->airport;
    }

    function service($data)
    {
        $code_origin = $data["origin_iata_code"];
        $lng_origin = $data["origin_longitude"];
        $la_origint = $data["origin_latitude"];

        $orig = $this->searchAirport($code_origin);
        if (!$orig) {
            $response_origin = $this->weather->serviceAPI($code_origin, $lng_origin, $la_origint);
            $this->airport[] =  $response_origin;
            $orig = $response_origin;
        }

        $code_destination =  $data["destination_iata_code"];
        $lng_destination =  $data["destination_longitude"];
        $lat_destination =  $data["destination_latitude"];

        $dest = $this->searchAirport($code_destination);
        if (!$dest) {
            $response_dest = $this->weather->serviceAPI($code_destination, $lng_destination, $lat_destination);
            $this->airport[] =  $response_dest;
            $dest = $response_dest;
        }

        return [
            "origin" => $orig,
            "destination" => $dest
        ];
    }

    function getAirports()
    {
        return $this->airport;
    }

    function searchAirport($code)
    {
        foreach ($this->airport as $airport) {
            if ($airport->code === $code) {
                return $airport;
            }
        }

        return null;
    }

    function pretty($clima, $data)
    {

        $pretty = "CUIDAD ORIGEN: " . $data["origin_name"] . " (" . $data["origin_iata_code"] . ")<br>
        MÁXIMA: " . $clima["origin"]->max . "°C &emsp; MÍNIMA:" .  $clima["origin"]->min . "°C <br>";
        $pretty .= "CUIDAD DESTINO: " .  $data["destination_name"] . " (" . $data["destination_iata_code"] . ")<br>
         MÁXIMA: " . $clima["destination"]->max . "°C &emsp; MÍNIMA:" .  $clima["destination"]->min . "°C <br>" . "<br><br>";

        return $pretty;
    }

    function close()
    {
        $this->weather->close();
    }
}
