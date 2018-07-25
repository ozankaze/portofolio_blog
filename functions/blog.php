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

// create data
function create_data($judul, $tag, $text) {
  global $link;

  $judul = mysqli_real_escape_string($link, $judul);
  $tag = mysqli_real_escape_string($link, $judul);
  $text = mysqli_real_escape_string($link, $judul);

  $query = "INSERT INTO `blogs` (`judul`, `tag`, `text`) VALUES ('$judul', '$tag', '$text')";
  // var_dump($query);die();
  if( mysqli_query($link, $query) ) {
    header("Location: index.php");
  } else {
    return false;
  }
}


?>
