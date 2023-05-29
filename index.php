<?php
         include_once "views/top.php";
         include_once "views/nav.php";
         include_once "views/header.php";
?>
<?php
         
         include_once "systemGeneration/postGenerator.php";
         include_once "views/body.php";
         include_once "views/footer.php";
         include_once "views/base.php";
?>
<?php
$start = 0;
if(isset($_GET['start'])){
    $start = $_GET['start'];
}
echo $start;
?>