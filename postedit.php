<?php
include_once "views/top.php";
include_once "views/nav.php";
include_once "views/header.php";
include_once "systemGeneration/postGenerator.php";
if (isset($_GET["pid"])) {
    $pid = $_GET["pid"];
    $result = getSinglePost($pid);
    $posts = [];
    foreach ($result as $item) {
        $posts["title"] = $item["title"];
        $posts["writer"] = $item["writer"];
        $posts["content"] = $item["content"];
        $posts["imglink"] = $item["imglink"];
    }
}
if (isset($_POST["submit"])) {
    $file = $_FILES["file"];
    $imgname = " ";
    if ($_FILES["file"]["name"] != null) {
        $imgname = mt_rand(time(), time()) . "_" . $_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"], "assets/uploads/" . $imgname);
    } else {
        $imgname = $_POST["oldimg"];
    }
    $title = $_POST["postitle"];
    $postype = $_POST["postype"];
    $postwriter = $_POST["postwriter"];
    $postcontent = $_POST["postcontent"];
    $imglink = $imgname;
    $pid = $_GET["pid"];
    echo $pid;
    updatePost($title, $postype, $postwriter, $postcontent, $imglink, $pid);
}
?>
<div class="container my-4">
    <div class="row">
        <?php include_once "views/sidebar.php"; ?>
        <section class="col-md-9">
            <form action="postedit.php?pid=<?php echo $_GET["pid"]; ?>" class="border border-primary p-5" enctype="multipart/form-data" method="post">
                <h2 class="text-center text-danger">Post Edit Form</h2>
                <div class="mb-3">
                    <label for="postitle" class="english">Post Title</label>
                    <input type="text" class="form-control english" id="postitle" name="postitle" value="<?php echo $posts["title"] ?>">
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
                    <input type="text" class="form-control english" id="postwrite" name="postwrite" value="<?php echo $posts["writer"]; ?>">
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <input type="file" name="file" class="form-control" id="file">
                        <input type="hidden" name="oldimg" value="<?php echo $posts["imglink"]; ?>">
                    </div>
                    <img src="assets/uploads/<?php echo $posts['imglink']; ?>" alt="photo" class="img-fluid">
                </div>
                <div class="mb-3">
                    <label for="postcontent" class="english">Content</label>
                    <textarea type="text" class="form-control" id="postcontent" name="postcontent" row="15">
                    <?php echo $posts["content"] ?>
                    </textarea>
                </div>
                <div class="container mt-5">
                    <div class="row">
                        <button class="btn btn-light mb-3">Cancel</button>
                        <button type="submit" name="submit" class="btn btn-primary mb-3">Update</button>
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