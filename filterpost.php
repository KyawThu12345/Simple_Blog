<?php
include_once "views/top.php";
include_once "views/nav.php";
include_once "systemGeneration/postGenerator.php";
?>
<div class="container my-4">
    <div class="row">
        <?php include_once "views/sidebar.php"; ?>
        <section class="col-md-9">
            <div class="row">
                <?php
                $result = " ";
                $result = (checkSession("username")) ? getFilteredPost($_GET["sid"],2) : getFilteredPost($_GET["sid"],1);
                foreach ($result as $post) {
                    $pid = $post["id"];
                    echo '<div class="col-md-6 mb-3">
                <div class="card">
                 <div class="card-block">
                      <h1 class="text-center">' . $post["title"] . '</h1>
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
<?php
include_once "views/footer.php";
include_once "views/base.php";
?>