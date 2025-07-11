<?php

require_once '../../model/model_area.php';

$MU = new Modelo_Area(); //Instanciamos la clase del modelo usuario
$consulta = $MU->Listar_Area(); //LLamamos a la función que obtiene los usuarios

if ($consulta) { //Si la consulta devuelve datos, los convierte en JSON con json_encode().
    echo json_encode($consulta); //convertimos los datos en formato JSON
} else { //Enviar un JSON Vacío si No Hay Datos
    echo '{"sEcho":1,
           "iTotalRecords": "0",
           "iTotalDisplayRecords": "0",
           "aaData": [ ]
          }';
}