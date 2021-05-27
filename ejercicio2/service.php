<?php

/**
 * Response
 * 
 * @author Profesor
 * @version 1.0
 * @package Tarea7
 */
class Response {
    public $status;    
    public $result;
}
//Se guarda en variable la información PHP que 'entra' 
$postData=file_get_contents("php://input");
//Decodifica string JSON guardandolo en la variable $data
$data=json_decode($postData);
//Se crea objeto de clase Response
$response=new Response();
//Se comprueba si la variable $data no es false; en caso de que no lo sea se realizan las acciones siguientes:
//Se comprueba si se encuentra la propiedad n1 y n2 de $data y si son valores númericos
//En caso de ser positivas ambas condiciones se suman y se guardan en la propiedad result del objeto response anteriormente creado
//También se da valor a la propiedad status del objeto response
//En caso de fallar las condiciones anteriores se establece la propiedad status en error
if ($data) {  
       if (isset($data->n1) && isset($data->n2) &&
            is_numeric($data->n1) && is_numeric($data->n2))
       {
           $response->result=$data->n1+$data->n2;
           $response->status='OK';
       } else
       {
           $response->status='ERR';
       }
  
} else {
    $response->status='NOJSON';
}
//Retorna la representación JSON del objeto response
echo json_encode($response);