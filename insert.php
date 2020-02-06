<?php
require "functions.php";

if (!isset($_SESSION['id_user'])) {
    header("Location: index.php");
    exit();
}else{
    if(isset($_POST['delete'])){
        $id_cat = mysqli_real_escape_string(db(),$_POST['id_cat']);
         
        
        $sql11 = "SELECT name FROM category WHERE id_category = '$id_cat'";
        $result11 = mysqli_query(db(),$sql11);
        if(mysqli_num_rows($result11)>0){

            while($record=mysqli_fetch_array($result11)){
               $sqldel = "DELETE FROM category WHERE name ='$record[0]'";
               $res = mysqli_query(db(),$sqldel);
            }
            header('Location: admin.view.php');
                exit();

        }
        
        

    
    }elseif(isset($_POST['insert'])){
        $newc = mysqli_real_escape_string(db(),$_POST['newc']);
        $id_cat = mysqli_real_escape_string(db(),$_POST['id_cat']);
        if(!empty($newc)){
                
            
                $sql2="SELECT name from category WHERE name ='$newc'"; 
                $query2=mysqli_query(db(),$sql2);
                

                if(mysqli_num_rows($query2) == 0){
                    $sql3 = "INSERT INTO category(id_category,name) VALUES (NULL,'$newc')";
                    $query3 = mysqli_query(db(),$sql3);
                    
                
                    if($query3){
                        header('Location: admin.view.php');
                        exit();
                    }
                    
                }
                header('Location: admin.view.php');
                exit();
            
            
            
            


            
    
        }elseif(empty($newc)){
            
            $file = $_FILES["file"];

            $id_cat = mysqli_real_escape_string(db(),$_POST['id_cat']);
         
        
            $sql1 = "SELECT id_category FROM category WHERE id_category = '$id_cat'";
            $result1 = mysqli_query(db(),$sql1);
    
            $title = mysqli_real_escape_string(db(),$_POST['title']);
            $image = $_FILES['file']["name"];
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

    
