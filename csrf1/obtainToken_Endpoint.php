<?php

    require_once 'token.php';
    session_start();

    if(isset($_POST['request'])){

        $sessionID = $_COOKIE['sessionID'];
        
        //token mapped to sessionID is extracted from tokens.txt
        $data['token']= token::obtainTokenbyID($sessionID);   
       
        echo json_encode($data);
    
    }  

?>