<?php

require_once("core/init.php");

if(isset($_SESSION['user'])) {
  header("Location: index.php");
} else {
  if ( isset($_POST['submit']) ) {
    $username = $_POST['username'];
    $password = $_POST['password'];
  
    if( !empty(trim($username)) AND !empty(trim($password)) ) {
  
      if( cek_data($username, $password) ) {
        $_SESSION['user'] = $username;
        header("Location: index.php");
  
      }
  
    } else {
      echo 'Password harus di isi';
    }
  
    
  }  
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="view/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="view/css/signin.css">
  </head>

  <body class="text-center">
    <form class="form-signin" method="POST">
      <!-- <img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

      <label for="inputEmail" class="sr-only">User name</label>
      <input name="username" type="text" id="inputEmail" class="form-control" placeholder="username" required autofocus>

      <label for="inputPassword" class="sr-only">Password</label>
      <input name="password" type="password" id="inputPassword" class="form-control" placeholder="password" required>
      <!-- <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div> -->
      <a href="index.php">Return Ke Home</a>
      <button name="submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <!-- <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p> -->
    </form>
  </body>
</html>
