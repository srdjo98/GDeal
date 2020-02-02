<?php
require "functions.php";

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string(db(),$_POST['status']);
    $id = mysqli_real_escape_string(db(),$_POST['id_user']);
    
    if($name == 0){
        header('Location: status.php');
                        exit();

    }elseif($name == 2){
        $name = "in progress";
    }elseif ($name == 3) {
        $name = "sent";
    }
   

    if($name == "in progress"){
        
     $sql = "UPDATE cart_order SET status = '$name' WHERE id_user = '$id'";
     $query = mysqli_query(db(),$sql) or die(mysqli_error(db()));
     var_dump($query);
    if($query){
        header('Location: status.php');
        exit();
    }


    }





}