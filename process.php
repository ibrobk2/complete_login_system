<?php

include_once "server.php";

?>

<?php   
    if(isset($_POST['register'])){
        //Variables Declaration
        $fname = mysqli_real_escape_string($server, $_POST['fname']);
        $username = mysqli_real_escape_string($server, $_POST['user']);
        $email = mysqli_real_escape_string($server, $_POST['email']);
        $password = mysqli_real_escape_string($server, $_POST['pass']);

        

    }

?>