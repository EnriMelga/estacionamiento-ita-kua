<?php
    //API
    //MOSTRAR TARIFAS SEGUN TIPO DE VEHICULO
    require "mostrarTarifas.php";
    $tipoVehiculo = $_GET["tipovehiculo"];
    $tarifas = new MostrarTarifas();
    $array_tarifas = $tarifas->get_tarifas($tipoVehiculo);
    //mostrando en json
        //el parametro unescaped unicode hace que se vean bien acentos y demas caracteres latinos
        echo  json_encode($array_tarifas, JSON_UNESCAPED_UNICODE);
?>
