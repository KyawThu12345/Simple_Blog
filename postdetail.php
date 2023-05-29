<?php
include_once "views/top.php";
include_once "views/nav.php";
include_once "views/header.php";
include_once "systemGeneration/postGenerator.php";
if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];
}
?>
<div class="container my-4">
    <div class="card col-md-8 offset-md-2">
        <?php
        $result = getSinglePost($pid);
        foreach ($result as $data) {
            echo "<div class='card-header'>" . $data["title"]."<br>" .'<span>'.$data["created_at"]."</span></div>";
            echo '<img src="assets/uploads/' . $data["imglink"] . '" alt="photo">';
            echo "<div class='card-block py-3 text-center english'>" . $data["content"] . "</div>";
            echo '<div class="card-footer"><div class="row">
            <div class="d-flex justify-content-end">
            <p class="py-1">' . $data["writer"] . '</p>
            </div></div></div>';
        }
        ?>
    </div>
</div>
<?php
include_once "views/footer.php";
include_once "views/base.php";
?>