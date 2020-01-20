<?php require "partials/head.php"; ?>
<?php 
    if(isset($_SESSION['id'])){
        header('Location: loginsession.php');
    }
?>
<?php require "partials/navbar.php"; ?>
<?php require "partials/footer.php"; ?>