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
    $bol = insertPost($postitle, $postype, $postwrite, $postcontent, $imglink);
    if ($bol) {
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
            <form action="admin.php" class="border border-primary p-5" enctype="multipart/form-data" method="post">
                <h2 class="text-center text-danger">Post Insert Form</h2>
                <div class="mb-3">
                    <label for="postitle" class="english">Post Title</label>
                    <input type="text" class="form-control english" id="postitle" name="postitle">
                </div>
                <div class="mb-3">
                    <label for="postype" class="english">Post Type</label>
                    <select class="form-control" id="postype" name="postype">
                        <option value="1">Free Post</option>
                        <option value="2">Paid Post</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="postwriter" class="english">Post Writer</label>
                    <input type="text" class="form-control english" id="postwrite" name="postwrite">
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <input type="file" name="file" class="form-control" id="file">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="postcontent" class="english">Content</label>
                    <textarea type="text" class="form-control" id="postcontent" name="postcontent" row="15"></textarea>
                </div>
                <div class="container mt-5">
                    <div class="row">
                        <button class="btn btn-light mb-3">Cancel</button>
                        <button type="submit" name="submit" class="btn btn-primary mb-3">Post</button>
                    </div>
                </div>

            </form>

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