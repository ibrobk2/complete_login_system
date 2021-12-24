
<?php   
// initializing variables
        $username = "";
        $email    = "";
        $errors = array(); 
        $password = "";

        include_once "server.php";
        include_once "errors.php";


    if(isset($_POST['register'])){
        //Variables Declaration
        $fname = mysqli_real_escape_string($server, $_POST['fname']);
        $username = mysqli_real_escape_string($server, $_POST['user']);
        $email = mysqli_real_escape_string($server, $_POST['email']);
        $password = mysqli_real_escape_string($server, $_POST['pass']);
        $password2 = mysqli_real_escape_string($server, $_POST['pass2']);
        
        // form validation: ensure that the form is correctly filled ...
        if(empty($fname)){array_push($errors, "Full name is required");}
        if(empty($username)){array_push($errors, "Username is required");}
        if(empty($email)){array_push($errors, "e-mail is required");}
        if(empty($password)){array_push($errors, "Password is required");}
        if(empty($password2)){array_push($errors, "Confirm Password is required");}
        if($password!=$password2){
            array_push($errors, "Passwords Mismatched!");
        }
        // To check whether user exist in the database
        $query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
        $result = mysqli_query($server, $query);
        $user = mysqli_fetch_assoc($result);

        if($user){
            if($user['username']==$username){
                array_push($errors, "Username already exist.");

            }
            if($user['email']==$email){
                array_push($errors, "Email already exist.");

            }
        }
        // Finally register a user if there are no errors in the form

  if (count($errors) == 0) {
  	$password = md5($password);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (id, name, username, email, password) 
  			  VALUES(null, '$fname', '$username', '$email', '$password')";
  	mysqli_query($server, $query);
  	$_SESSION['fname'] = $fname;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

// LOGIN USER
if (isset($_POST['user_login'])) {
    $username = mysqli_real_escape_string($server, $_POST['username']);
    $password = mysqli_real_escape_string($server, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($server, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: home.php');
        }else {
            
            array_push($errors, "Wrong username/password combination");
            // header("location: login.php");
        }
    }
  }
  
  ?>
  



        

    
