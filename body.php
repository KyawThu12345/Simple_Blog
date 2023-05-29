<div class="container my-4">
  <div class="row">
    <?php include_once "views/sidebar.php"; ?>
    <section class="col-md-9">
      <div class="row">
        <?php
        $result = " ";
        if (checkSession("username")) {
          $result = getAllPost(2);
        } else {
          $result = getAllPost(1);
        }
        foreach ($result as $post) {
          $pid = $post["id"];
          echo '<div class="col-md-6 mb-3">
                <div class="card">
                 <div class="card-block">
                      <h1 class="text-center">' . substr($post["title"], 0, 30) . '</h1>
                      <p class="text-center">' . substr($post["content"], 0, 100) . '</p>
                      <a class="btn btn-info btn-sm m-1" href="postdetail.php?pid=' . $pid . '">Details</a>
                 </div>
                </div>
                </div>';
        }
        ?>
      </div>
  </div>
  </section>
</div>
<div class="container">
  <div class="col-md-4 offset-md-4">
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <?php
        $rows = getPostCount();
        $t = 0;
        for ($i = 0; $i<$rows; $i += 10){
          $t++;
          echo '<li class="page-item"><a class="page-link" href="index.php?start='.$i.'">'.$t.'</a></li>';
        }
        ?>
      </ul>
    </nav>
  </div>
</div>
<?php 
?>