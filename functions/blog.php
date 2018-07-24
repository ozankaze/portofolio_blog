<?php

// cek admin login
function cek_data($username, $password) {
  global $link;

  $username = mysqli_real_escape_string($link, $username);
  $password = mysqli_real_escape_string($link, $password);

  $query = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'";
  // var_dump($query);die();
  if( $result = mysqli_query($link, $query) ) {
    if( $a = mysqli_num_rows($result) == 1 ) {
      return true;
    } else {
      return false;
    }
  }

}


?>
