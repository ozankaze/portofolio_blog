<?php

function cek_data($username, $password) {
  global $link;

  $username = mysqli_real_escape_string($link, $username);
  $password = mysqli_real_escape_string($link, $password);

  $query = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'";
  // var_dump($query);die();
  if( mysqli_query($link, $query) ) {
    return true;
  } else {
    return false;
  }

}


?>
