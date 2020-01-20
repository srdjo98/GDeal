<?php
    require "functions.php";
    
    if(isset($_GET['submit']) AND !empty($_GET['submit'])){ 

    $search = $_GET['search'];
    
    if(!empty($search)){
    $sql = "SELECT * FROM product WHERE (`title` LIKE '%".$search."%') OR (`price` LIKE '%".$search."%')  OR (`description` LIKE '%".$search."%')";
    $result = mysqli_query(db(),$sql);
  
    if (mysqli_num_rows($result) > 0) {
         

        while ($records = mysqli_fetch_assoc($result)) {

            $_SESSION['id_product'] = $records['id_product'];
            $_SESSION['title'] = $records['title'];
            $_SESSION['image'] = $records['image'];
            $_SESSION['description'] = $records['description'];
            $_SESSION['price'] = $records['price'];
           
            
            
                
            
        }
        header('Location: loginsession.view.php');
       
    }else {
        header('Location: loginsession.view.php?search=nothing2');
        exit();
    }


}else {
        header('Location: loginsession.view.php?search=nothing');
            
        }
    }


?>