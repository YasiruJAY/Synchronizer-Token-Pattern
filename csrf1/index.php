<?php

require_once 'token.php';
$flag = 0;

if(isset($_POST['username'],$_POST['password'])){

	$uname = $_POST['username'];
    $pwd = $_POST['password'];

	if($uname == 'user' && $pwd == 'csrf1'){
        session_start();
        $_SESSION['id'] = session_id();                 //generating session identifier
        $_SESSION['token'] = token::generateToken();    //generating token using generateToken() method of the token class

        setcookie('sessionID', $_SESSION['id'], time() + (86400 * 30), "/");    //setting cookie with session ID valid for 30 days

        //mapping token with session ID and storing it in the server side
        $myfile = fopen("tokens.txt", "a") or die("Unable to open file!");
        $txt = $_SESSION['id'].",".$_SESSION['token']."\n";
        fwrite($myfile, $txt);
        fclose($myfile);

        header('Location:updateStatus.php');
	}
	else{
		$flag = 1;
	}
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Synchronizer Token Pattern - Login</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="style.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="wrapper fadeInDown">
            <div id="formContent">
            
                <div class="fadeIn first">
                <img src="csrf.jpg" id="icon" alt="User Icon" /><br>
                <h3><b>SYNCHRONIZER TOKEN PATTERN</h3>
                </div>

                <br>
                <?php 
                    if($flag == 1){
                    echo "<h4><b><font color='red'>Invalid credentials!</h4>";
                    }
                ?>

                <form action="index.php" method="POST">
                <input type="text" id="login" class="fadeIn second" name="username" placeholder="username">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
                <br><br>

                <div id="formFooter">
                <input type="submit" class="fadeIn fourth" name="login" value="Log In">
                </div>
                </form>
            </div>
        </div>
    </body>
</html>