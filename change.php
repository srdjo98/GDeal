<?php
require "functions.php";

if (!isset($_SESSION['id_user'])) {
    header("Location: index.php");
    exit();
}

if(isset($_POST['update']) ){
    

        $file = $_FILES["file"];
        $image = $_FILES['file']["name"];
        $id_product =   mysqli_real_escape_string(db(),$_POST['id_product']);
        $title = mysqli_real_escape_string(db(),$_POST['title']);
        
        $description = mysqli_real_escape_string(db(),$_POST['description']);
        $price = (int)mysqli_real_escape_string(db(),$_POST['price']);
        
        $sql = "UPDATE product SET ";
        if(!empty($title)){
            $sql  .= "title= '$title',";
        }if(!empty($price)){
            $sql  .= "price= '$price',";
        }if(!empty($image)){
            $sql  .= "image= '$image',";
        }if(!empty($description)){
            $sql  .= "description= '$description',";
        }
        $sql  .= "updated_at= now()";
        $sql = rtrim($sql, ',');
        $sql .= "WHERE id_product ='$id_product'";
        $query = mysqli_query(db(),$sql) or die(mysqli_error(db()));


        if($query){
            header('Location: admin.view.php');
            exit();
        }

    

        

}elseif(isset($_POST['delete'])){

  
    $id_product =   (int)mysqli_real_escape_string(db(),$_POST['id_product']);
    

    $sql = "DELETE FROM product WHERE id_product = '$id_product'";
    $query = mysqli_query(db(),$sql);
    
    if($query){
        header('Location: admin.view.php');
        exit();
    }else{
        echo "NT bic";
    }
    
    

}else{

    
        header('Location: admin.view.php');
    

}



 