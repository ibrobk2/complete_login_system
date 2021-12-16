<?php
include_once "server.php";

if(!isset($_SESSION['fname'])){
    header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['fname'];?></h2>
    <h3><?php  echo $_SESSION['success'];?></h3>

</body>
</html>