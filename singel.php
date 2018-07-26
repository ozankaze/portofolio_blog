<?php
require_once "core/init.php";
require_once "view/header.php";

$id = $_GET['id'];

$query = "SELECT * FROM `blogs` WHERE id='$id'";
$article = mysqli_query($link, $query);


?>


<main role="main">
      <div class="row">
        <div class="col-md-12 blog-main">
          <!-- <h3 class="pb-3 mb-4 font-italic border-bottom">
            From the Firehose
          </h3> -->

          <?php while( $row = mysqli_fetch_assoc($article) ) : ?>
          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['judul'] ?></h2>
            <p class="blog-post-meta"><?php echo $row['waktu'] ?> By <a href="#">Fauzan</a></p>

            <p><?php echo $row['text'] ?></p>
          </div><!-- /.blog-post -->
          <?php endwhile ?>

        </div><!-- /.blog-main -->

      </div><!-- /.row -->

    </main><!-- /.container -->


<?php
require_once("view/footer.php");
?>
