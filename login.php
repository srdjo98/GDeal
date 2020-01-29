<?php

require_once "functions.php";


    $email = mysqli_real_escape_string(db(),$_POST['email']);
    $password = mysqli_real_escape_string(db(),$_POST['password']);

    $password_temp = SALT1 . "$password" . SALT2;

    
    $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password_temp' AND verified = 1 ";
    $query = mysqli_query(db(),$sql);
    $result = mysqli_fetch_assoc($query);

    $passwordn = md5($password);

    $sql1 = "SELECT * FROM user WHERE email = '$email' AND password = '$passwordn' AND id_groups = '2' AND verified = 1 ";
    $query1 = mysqli_query(db(),$sql1);
    $result1 = mysqli_fetch_assoc($query1);
    
    if($result){
        logUser($result);
        
    }elseif($result1){
        logUser($result1);
        header('Location: admin.view.php');
    }else{
        header('Location: login.view.php');
    }
 
 
    
    


    