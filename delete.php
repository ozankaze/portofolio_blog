<?php
require_once "core/init.php";
 
if ( !isset($_SESSION['user']) ) {
  header("Location: login.php");
}

$id = $_GET['id'];

if( isset($_GET['id']) ) {
  $query = "DELETE FROM `blogs` WHERE `id`='$id'";
  
  if( mysqli_query($link, $query) ) {
    header("Location: index.php");
  } else {
    echo 'gagal';
  }
}

?>

