<?php

class Conexion{

    public static function conexion(){
        $conexion = new mysqli('localhost','root','','gimnasio_villanea');
        if (mysqli_connect_errno()) {
            printf("Falla de conexión: %s\n", mysqli_connect_error());
            exit();
        }
        return $conexion;
    }
}
?>