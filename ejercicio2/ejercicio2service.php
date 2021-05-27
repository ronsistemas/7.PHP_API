<?php

/**
 * Response
 * 
 * @author Ron
 * @version 2.0
 * @package Tarea7
 */
class Response {
    public $status;    
    public $latitude;
    public $longitude;
    public $description;
}

$postData=file_get_contents("php://input");

$data=json_decode($postData);

$response=new Response();

if ($data != null) {  
   //Array con los lugares
      $array = [
         [
            "status"=> "OK",
            "latitude" =>48.858518312684765, 
            "longitude" =>  2.294599315446447,
            "description" => "Torre Eiffel"
         ],
         [
            "status"=> "OK",
            "latitude" => 37.17611247405381, 
            "longitude" => -3.5879052676406267,
            "description" => "Alhambra"
         ],
         [
            "status"=> "OK",
            "latitude" => 41.89039387573074, 
            "longitude" => 12.492745882237998,
            "description" => "Coliseo"
         ],
         [
            "status"=> "OK",
            "latitude" => 35.36146369873629,
            "longitude" => 138.72744910676727,
            "description" => "Monte Fuji"
         ]
         ];
      //Se comprueba que el lugar introducido se encuentra en el array
      for($i=0;$i<count($array);$i++) {
         if(strcmp($data, $array[$i]['description']) == 0) {
            $response->status = $array[$i]['status'];
            $response->latitude = $array[$i]['latitude'];
            $response->longitude = $array[$i]['longitude'];
            $response->description = $array[$i]['description'];
            $i = count($array);
         } else {
            $response->status = "Error";
         }
      }
} else {
    $response->status='Error';
}

echo json_encode($response);
 