<?php
session_start();

if(!isset($_SESSION['id'])){
    header('Location:index.php');
}

?>

<!DOCTYPE html>
<html>
    <head>
    <title>Synchronizer Token Pattern - Update Status</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="style.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- AJAX call to invoke the endpoint which obtains the CSRF token and add it to the hidden input field -->
        <script>
            $(document).ready(function(){
            
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("token_to_be_added").setAttribute('value', this.responseText) ;
                } 
            };
            
            xhttp.open("GET", "obtainToken.php", true);
            xhttp.send();
            
            });
        </script>

    </head>
    <body>
        <div class="wrapper fadeInDown">
            <div id="formContent">
  
                <div class="fadeIn first">
                <img src="csrf.jpg" id="icon" alt="User Icon" /><br>
                <h3><b>SYNCHRONIZER TOKEN PATTERN</h3>
                </div>

                <br><h4><b>Write a Status</h4>
                <form action="result.php" method="POST">
                <input type="text" id="status" class="fadeIn second" name="status" placeholder="write something...">
                <input type="hidden" name="token" value="" id="token_to_be_added"/>   <!-- token will be added to this field-->
                <br><br>

                <div id="formFooter">
                <input type="submit" class="fadeIn fourth" name="submit" value="Submit!">
                </div>
                </form>
            </div>
        </div>
    </body>
</html>