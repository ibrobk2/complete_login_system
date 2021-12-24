<?php  
// initializing variables
$username = "";
$email    = "";
$errors = array(); 

    include_once "server.php";
    // include_once "process.php";

    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <?php include "header.php" ;?>
<div class="container">
    <?php  
        if(isset( $_SESSION['logError'])):
    ?>
    <h4 style="color:red;"><?php echo  $_SESSION['logError']; ?></h4>
    <?php 
    session_unset();
        endif; ?>
    <h3>Please Login</h3>
        <div class="form justify-centered">

            <form action="login.php" class="form-group" method="post">
            
            <?php   include("process.php");
                    include("errors.php"); 
            ?>
                <input type="text" placeholder="Enter Username" class="form-control" name="username"><br>
                <input type="password" placeholder="Enter Password" class="form-control" name="password"><br>
                <button class="btn btn-primary form-control" name="user_login">Login</button><br>
            </form>
        </div>
    </div>
</body>
</html>