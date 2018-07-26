<?php
require_once "core/init.php";
require_once "view/header.php";
 
if ( !isset($_SESSION['user']) ) {
  header("Location: login.php");
}

$id = $_GET['id'];
$query = "SELECT * FROM blogs WHERE id='$id'";
$articles = mysqli_query($link, $query);
$student = mysqli_fetch_assoc($articles);
// var_dump($student);die();

if( isset( $_POST['submit'] ) ) {
  $judul = $_POST['judul'];
  $tag = $_POST['tag'];
  $text = $_POST['text'];
  $image = $_FILES['file'];
  
  $update = update_data($judul, $tag, $text, $image, $id);

}

?>

<br>

<form method="POST" enctype="multipart/form-data">
<div class="form-group">
    <label for="judul">Judul</label>
    <input name="judul" type="text" class="form-control" id="judul" value="<?php echo $student['judul'] ?>">
  </div>
  <div class="form-group">
    <label for="tag">Tag</label>
    <input name="tag" type="text" class="form-control" id="tag" value="<?php echo $student['tag'] ?>">
  </div>
  <div class="form-group">
    <label for="text">Text</label>
    <input name="text" type="text" class="form-control" id="text" value="<?php echo $student['text'] ?>">
  </div>
  <div class="form-group">
    <label for="text">Gambar</label>
    <input name="file" type="file" class="form-control" id="text" placeholder="Text">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>

<?php

require_once("view/footer.php");
?>
