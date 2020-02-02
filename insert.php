<?php
require "functions.php";

if (!isset($_SESSION['id_user'])) {
    header("Location: index.php");
    exit();
}else{

    if(isset($_POST['insert'])){
        $title = mysqli_real_escape_string(db(),$_POST['title']);
        $newc = mysqli_real_escape_string(db(),$_POST['newc']);
        $id_cat = mysqli_real_escape_string(db(),$_POST['id_cat']);
        if(!empty($id_cat)){
            
            
                $sql2="SELECT id_category,name from category WHERE name ='$newc'"; 
                $query2=mysqli_query(db(),$sql2);
                
                if(mysqli_num_rows == 0){
                    $sql3 = "INSERT INTO category(id_category,name) VALUES (NULL,'$newc')";
                    $query3 = mysqli_query(db(),$sql3);
                
                    if($query3){
                        header('Location: admin.view.php');
                        exit();
                    }
                    
                }
        
            
            
            
            


            
    
        }elseif(empty($newc)){
       
         
        
         
        
        $sql1 = "SELECT id_category FROM category WHERE id_category = '$id_cat' AND name";
        $result1 = mysqli_query(db(),$sql1);
        
        
        if (mysqli_num_rows($result1) > 0) {
            
    
            while ($record = mysqli_fetch_array($result1, MYSQLI_BOTH)) {
                
                   var_dump($record);
            }
    
        }elseif((!empty($title) and !empty($newc)) OR (!empty($title) and !empty($id_cat))){
    
    
            $title = mysqli_real_escape_string(db(),$_POST['title']);
            $image = mysqli_real_escape_string(db(),$_POST['image']);
            $description = mysqli_real_escape_string(db(),$_POST['description']);
            $price = (int)mysqli_real_escape_string(db(),$_POST['price']);
            
            $sql = "INSERT INTO product(id_product,id_category,title,price,image,description,updated_at,crated_at) VALUES(NULL,'$id_cat','$title','$price','$image','$description',now(),now()) ";
            $query = mysqli_query(db(),$sql);
    
            
            
        
            if($query){
                header('Location: admin.view.php');
                exit();
            }else{
                echo "asdasd";
            }
        }

    }


    }

    }
