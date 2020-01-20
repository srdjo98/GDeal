<?php

    require_once "functions.php";

    if(isset($_GET['vkey'])){

        $vkey = $_GET['vkey'];

        $sql = "SELECT verified,vkey FROM user WHERE verified = 0 AND vkey='$vkey' LIMIT 1";
        $query = mysqli_query(db(),$sql);

        if(mysqli_num_rows($query) == 1){

            $update = "UPDATE user SET verified = 1 WHERE vkey = '$vkey' LIMIT 1";
            $result = mysqli_query(db(),$update);
            if($result){
                header('Location: login.view.php?sucesse');
                exit();
            }else{

                header('Location: register.view.php?register=invalid2');
                exit();

            }
               
                 
            

        }else{
            header('Location: register.view.php?register=invalid');
        exit();
        }

    }else{
        header('Location: register.view.php');
        exit();
    }


?>