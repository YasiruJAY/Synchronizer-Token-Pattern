<?php

class token {

    //method to generate a random token
    public static function generateToken(){
        $token = base64_encode(openssl_random_pseudo_bytes(32));

        return $token;
    }
   
    //method to extract the token string belonging to a particular sessionID 
    public static function obtainTokenbyID($sessionID){
		
        $myfile = fopen("tokens.txt", "r") or die("Unable to open file!");
        
        while(!feof($myfile)) {
            $line = fgets($myfile);
            if (strpos($line, $sessionID) !== false) {
                list($sesID,$token) = explode(",",chop($line),2);

                return $token;
            }
        }

		fclose($myfile);

    }
    
    //method to compare the passed token with the token belonging to a particular sessionID
	public static function compareTokens($token,$sessionID){

        $tok = token::obtainTokenbyID($sessionID);

        if($tok == $token){
            return true;
        }
        else{
            return false;
        }
    }
    
}
?>