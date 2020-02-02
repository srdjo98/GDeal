<?php
require "functions.php";

if (!isset($_SESSION['id_user'])) {
    header("Location: index.php");
    exit();
}else{

    if(isset($_POST['insert'])){
        $newc = mysqli_real_escape_string(db(),$_POST['newc']);
        $id_cat = mysqli_real_escape_string(db(),$_POST['id_cat']);
        if(!empty($newc)){
            
            
                $sql2="SELECT name from category WHERE name ='$newc'"; 
                $query2=mysqli_query(db(),$sql2);
                

                if(mysqli_num_rows($query2) == 0){
                    $sql3 = "INSERT INTO category(id_category,name) VALUES (NULL,'$newc')";
                    $query3 = mysqli_query(db(),$sql3);
                    var_dump($query3);
                    exit();
                
                    if($query3){
                        header('Location: admin.view.php');
                        exit();
                    }
                    
                }
                header('Location: admin.view.php');
                exit();
            
            
            
            


            
    
        }elseif(empty($newc)){
            
            $id_cat = mysqli_real_escape_string(db(),$_POST['id_cat']);
         
        
            $sql1 = "SELECT id_category FROM category WHERE id_category = '$id_cat'";
            $result1 = mysqli_query(db(),$sql1);
    
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

    
