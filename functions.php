<?php

require "config.php";
session_start();

function db(){

    $con = mysqli_connect(HOST,USER,PASSWORD,DATABASE) or die(mysqli_error());

    return $con;
}

function dd($val){

    echo "<pre>";
    die(var_dump($val));
    echo "</pre>";
}


function logUser($user){

        session_start();
        $_SESSION['id_user'] = $user['id_user'];
        $_SESSION['name'] = $user['name'];
        header('Location: loginsession.php');

}

function getALL(){


    
    $sql = "SELECT product.id_product,product.id_category,product.title,product.price,product.image,product.description,category.name FROM product INNER JOIN category ON product.id_category = category.id_category"; 
    
    $query = mysqli_query(db(),$sql);
    $result = mysqli_fetch_all($query,MYSQLI_ASSOC);
    return $result;
}





