<?php
require_once "core/init.php";
require_once "view/header.php";
 
// if ( !isset($_SESSION['user']) ) {
//   header("Location: login.php");
// }

$query = "SELECT * FROM blogs";
$articles = mysqli_query($link, $query);
// $row = mysqli_fetch_assoc($link, $articles);

$total = mysqli_num_rows($articles);

if( isset($_GET['search']) ) {
  $search = $_GET['search'];
  $articles = cari_data($search);
}

// pagination
$perPage = 3; // halaman
$page = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
// die("per " . $page);

$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

$query2 = "SELECT * FROM `blogs` LIMIT $start, $perPage";
$articles2 = mysqli_query($link, $query2);

$pages = ceil($total/$perPage);


?>

      

      <!-- <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
          <a class="p-2 text-muted" href="#">World</a>
          <a class="p-2 text-muted" href="#">U.S.</a>
          <a class="p-2 text-muted" href="#">Technology</a>
          <a class="p-2 text-muted" href="#">Design</a>
          <a class="p-2 text-muted" href="#">Culture</a>
          <a class="p-2 text-muted" href="#">Business</a>
          <a class="p-2 text-muted" href="#">Politics</a>
          <a class="p-2 text-muted" href="#">Opinion</a>
          <a class="p-2 text-muted" href="#">Science</a>
          <a class="p-2 text-muted" href="#">Health</a>
          <a class="p-2 text-muted" href="#">Style</a>
          <a class="p-2 text-muted" href="#">Travel</a>
        </nav>
      </div> -->

      <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
          <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
          <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what's most interesting in this post's contents.</p>
          <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
        </div>
      </div>

      <div class="row mb-2">
        <!-- ini parameter gak bisa nerima true false mysqli_fetch_assoc-->
        <?php while( $row = mysqli_fetch_assoc($articles) ) : ?> 
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-primary"><?php echo $row['tag'] ?></strong>
              <h3 class="mb-0"> <?php echo $row['judul'] ?></h3>
              <div class="mb-1 text-muted"><?php echo $row['waktu'] ?></div>
              <p class="card-text mb-auto"><?php echo $row['text'] ?></p>
              <a href="singel.php?id=<?php echo $row['id'] ?>">Continue reading</a>
              <?php if( $login == true ) : ?>
                <a href="update.php?id=<?php echo $row['id'] ?>">Edit</a>
                <a href="delete.php?id=<?php echo $row['id'] ?>">Delete</a>
              <?php endif ?>
            </div>
            <!-- <img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap"> -->
            <img src="view/images/<?php echo $row['file'] ?>" alt="" width="240" height="248">
          </div>
        </div>
        <?php endwhile ?>
      </div>
      <div>
        <?php for( $i = 1; $i <= $pages; $i++ ) : ?>
          <a href="?halaman=<?php echo $i ?>"><?php echo $i ?></a>
        <?php endfor ?>
      </div>

<?php
require_once("view/footer.php");
?>
