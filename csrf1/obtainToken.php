<?php

    require_once 'token.php';
    session_start();

    $sessionID = $_COOKIE['sessionID'];
    
    //token mapped to sessionID is extracted from tokens.txt
    $token = token::obtainTokenbyID($sessionID);   

    echo $token;

?>