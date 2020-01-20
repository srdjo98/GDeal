<?php
require "functions.php";

if (!isset($_SESSION['id_user'])) {
    header("Location: index.php");
    exit();
}

if(isset($_POST['insert'])){

    $name = mysqli_real_escape_string(db(),$_POST['name']);
    $sql1 = "SELECT id_category FROM category WHERE name = '".$name."'";
    $query = mysqli_query(db(),$sql1);
    $result = mysqli_fetch_assoc($query);
    
    foreach($result as $k => $v){
        $id_category = $v;
    }
    var_dump($id_category);

        $title = mysqli_real_escape_string(db(),$_POST['title']);
        $image = mysqli_real_escape_string(db(),$_POST['image']);
        $description = mysqli_real_escape_string(db(),$_POST['description']);
        $price = (int)mysqli_real_escape_string(db(),$_POST['price']);
        
        $sql = "INSERT INTO product(id_product,id_category,title,price,image,description,updated_at,crated_at) VALUES(NULL,'$id_category','$title','$price','$image','$description',now(),now()) ";
        $query = mysqli_query(db(),$sql);
       
        
        
    
        if($query){
            header('Location: admin.view.php');
            exit();
        }else{
            echo "asdasd";
        }
    
    


    

}