<?php

session_start();
$id_product = "";

if (!isset($_SESSION['id_user'])) {
    header("Location:index.php");
    exit();
}
if(isset($_GET['id_product'])) {
    $id_product = (int)$_GET['id_product'];
}
if (is_int($id_product)) {
    unset($_SESSION['cart'][$id_product]);
}

header("Location: cart.view.php");
exit();
?>