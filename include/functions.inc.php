<?php
        
        /**
         * Función que configura sesión curl y establece sus diferentes opciones
         * get
         * 
         * @access public
         * @param string $url   Url a la que se ha de conectar
         * @param string $params 
         * @return void
         */
        function get($url,$params = null) {
            //Inicia sesión cURL
            $ch = curl_init();
            //Comprueba si el parámetro $params es un array y no se encuentra vacío
            //Si es así, almacena su conversión en una cadena estilo URL; en caso contrario se deja vacío
            $tail=is_array($params) && !empty($params)?'?'.http_build_query($params):'';
            //Establece las opciones para la sesión curl anteriormente iniciada
            curl_setopt($ch, CURLOPT_URL, $url.$tail);   //Dirección URL a capturar                         
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); //Sigue cualquier encabezado 'Location' uq eel servidor envíe en el encabezado HTTP
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Devuelve el resultado de la transferencia como string (valor de curl_exec)
            //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
            //Ejecuta la sesión cURL que se le pasa como parámetro.
            $output = curl_exec($ch); 
            //Cierra sesión CURL y libera sus recursos.       
            curl_close($ch); 
            //Devuelve resultado de la ejecución de la sesión curl.    
            return $output;
        }
        
        /**
         * Función que configura sesión curl y establece sus diferentes opciones
         * Se configura para funcionar con método POST
         * post
         *
         * @access public
         * @param string $url           Url a la que se ha de conectar
         * @param string $postdata      Posibles parámetros a enviar (localización en algún ejercicio)
         * @param boolean $json          Establece si se envian los datos con formato json
         * @return void
         */
        function post($url,$postdata,$json=false) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);     //Establece la transmisión HTTP tipo POST
            // Datos para enviar vía HTTP "POST
            //Según el valor del parámetro $json, se enviará el parámetro $postdata en formato json o no
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json?json_encode($postdata):$postdata); 
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            //Establece el 'Content Type' de la cabecera a 'application/json' (siempre que se reciba el parámetro $json)
            $json && curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);        
            curl_close($ch);     
            return $output;
        }