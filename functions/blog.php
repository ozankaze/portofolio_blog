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
function create_data($judul, $tag, $text, $image) {
  
  global $link;

  $judul = mysqli_real_escape_string($link, $judul);
  $tag = mysqli_real_escape_string($link, $judul);
  $text = mysqli_real_escape_string($link, $judul);
  $image = upload();

  $query = "INSERT INTO `blogs` (`judul`, `tag`, `text`, `file`) VALUES ('$judul', '$tag', '$text', '$image')";
  // var_dump($query);die();
  if( mysqli_query($link, $query) ) {
    header("Location: index.php");
  } else {
    return false;
  }
}

function upload() {

  $time = time();
  $nama  = $_FILES['file']['name'];
  $error = $_FILES['file']['error'];
  $size  = $_FILES['file']['size'];
  $asal  = $_FILES['file']['tmp_name'];
  $format= $_FILES['file']['type'];
  $namafile = 'view/images/' . $nama;

  //$format2 = pathinfo($nama, PATHINFO_EXTENSION);

  if( $error == 0 ){
    if($size < 1000000){

        if($format == 'image/jpeg' ){

            if( file_exists($namafile) ) {
                $namafile = str_replace(".jpg", "", $namafile);
                $namafile = $namafile . "_" . $time . ".jpg";
                // die($namafile);
            }

            //mengupload
            $a = move_uploaded_file($asal, $namafile);
            echo 'berhasil upload!';

        }else{
            echo 'formatnya harus jpeg';
        }

    }else{
    echo 'gambarnya kegedean';
    }

  }else{
    echo 'ada error';
  }

  return $namafile;
}


// update data
function update_data($id) {

  global $link;

  $judul = $_POST['judul'];
  $tag = $_POST['tag'];
  $text = $_POST['text'];

  $judul = mysqli_real_escape_string($link, $judul);
  $tag = mysqli_real_escape_string($link, $judul);
  $text = mysqli_real_escape_string($link, $judul);

  $query = "UPDATE `blogs` SET `judul` = '$_POST[judul]', `tag` = '$_POST[tag]', `text` = '$_POST[text]' WHERE `id`='$id'";
  // var_dump($query);die();
  if( mysqli_query($link, $query) ) {
    header("Location: index.php");
  } else {
    echo 'gagal';
  }
}


?>
