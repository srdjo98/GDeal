<?php

require "functions.php";


if (!isset($_SESSION['id_user'])) {
    header("Location: index.php");
    exit();
}
if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = [];
}



$amount = (int)mysqli_real_escape_string(db(),$_POST['amount']);
$id_product = (int)mysqli_real_escape_string(db(), $_POST['id_product']);

// "12" "12 a"
// (int)"12" -> 12
if (is_int($amount) AND $amount > 0) {
    //$_SESSION['cart'][$id_product] = $amount+$_SESSION['cart'][$id_product];
    $_SESSION['cart'][$id_product] += $amount; // INSERT ADD $_SESSION['cart'][3] = 22;
    
    //$_SESSION['cart'][$id_product] = $amount; // UPDATE $_SESSION['cart'][3] = 12;

}


header("Location: loginsession.view.php");
exit();

?>