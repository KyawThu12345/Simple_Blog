<?php
include_once "views/top.php";
include_once "views/nav.php";
include_once "views/header.php";
include_once "systemGeneration/postGenerator.php";
if (isset($_POST['submit'])) {
    $postitle = $_POST['postitle'];
    $postype = $_POST['postype'];
    $postwrite = $_POST['postwrite'];
    $postcontent = $_POST['postcontent'];
    $file = $_FILES['file'];
    $imglink = mt_rand(time(), time()) . "_" . $_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], 'assets/uploads/' . $imglink);
    $bol = insertPost($postitle, $postype, $subject, $postwrite, $postcontent);
    if($bol) {
        echo "<div class='container'></divcontainer><div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    Post Insert Successfully
  </div></div>";
    } else {
        echo "<div class='container'></divcontainer><div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    Post Insert Fail
  </div></div>";
    }
}
?>
<div class="container my-4">
    <div class="row">
        <?php include_once "views/sidebar.php"; ?>
        <section class="col-md-9">
            <?php
            $result = getAllPost(2);
            foreach ($result as $post) {
                echo '<div class="card col-md-12 mb-3">
                <div class="card-block">
                <h5 class="text-center">' . $post["title"] . '</h5>
                <p class="text-center">' . substr($post["content"], 0, 100) . '</p>
                <a href="postedit.php?pid=' . $post["id"] . '" class="btn btn-info m-2">Edit</a>
                </div></div>';
            }
            ?>
        </section>
    </div>
</div>
<?php
if (checkSession("username")) {
    if (getSession("username") != "minkyawthu") {
        header("Location:index.php");
    }
} else {
    header("Location: index.php");
}
include_once "views/footer.php";
include_once "views/base.php";
?>