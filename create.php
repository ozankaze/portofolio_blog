<?php
require_once "core/init.php";
require_once "view/header.php";
 
if ( !isset($_SESSION['user']) ) {
  header("Location: login.php");
}

if( isset($_POST['submit']) ) {

  $query = create_data($judul, $tag, $text);

}


?>

<br>

<form method="POST">
<div class="form-group">
    <label for="judul">Judul</label>
    <input name="judul" type="text" class="form-control" id="judul" placeholder="Judul">
  </div>
  <div class="form-group">
    <label for="tag">Tag</label>
    <input name="tag" type="text" class="form-control" id="tag" placeholder="Tag">
  </div>
  <div class="form-group">
    <label for="text">Text</label>
    <input name="text" type="text" class="form-control" id="text" placeholder="Text">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>


<?php
require_once("view/footer.php");
?>
