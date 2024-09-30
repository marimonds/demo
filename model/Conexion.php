<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Conexion
{

    private $servername = "localhost";
    private $username = 'root';
    private $password = '';
    private $databases = "weather";
    private $conn;

    function __construct()
    {


        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->databases);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        if (!$this->conn->set_charset("utf8")) {
            printf("Can't set utf8: %s\n", $this->conn->error);
        }
    }

    function getQuery($sql)
    {
        $data = [];

        if ($result = $this->conn->query($sql)) {
            while ($row = $result->fetch_object()) {
                $data[] = $row;
            }
            $result->close();
        } else {

            echo  $this->conn->error;
        }
        return $data;
    }

    function setQuery($sql)
    {

        if ($this->conn->query($sql)) {
        } else {
            echo  $this->conn->error;
        }
    }


    function getLastId()
    {
        return $this->conn->insert_id;
    }

    function close()
    {
        $this->conn->close();
    }
}
