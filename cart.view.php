<?php require "partials/head.php"; ?>
<?php require "partials/navbar.php"; ?>

<?php

if(empty($_SESSION['cart'])){
   echo "<p class='display-3 text-center mt-3'>Your cart is empty !</p>";
}else{

$sum=0;




if(is_array($_SESSION['cart']) AND count($_SESSION['cart'])>0 )
{
   
      

     foreach($_SESSION['cart'] as $id_product => $amount){
      
      $_SESSION['amount'] = $amount;
     
      
    if(isset($_GET['update']) AND !empty($_GET['amountn'])){
    
         $id = (int)$_GET['id_product'];
         if($id_product==$id ){
          
         $amountn = (int)$_GET['amountn'];
         $amount = $amountn;
         $_SESSION['amount'] = $amountn;
      

      }


    }


      
     

       $sql = "SELECT title,price,image FROM product WHERE id_product = '$id_product'";
       $result = mysqli_query(db(),$sql) or mysqli_error(db(),$sql);
         if (mysqli_num_rows($result)>0)
         {
       
            while ($record = mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
               
                $sum+= $_SESSION['amount'] *$record['price'];
                echo '<div class="col-4">';
                echo '<div class="card mb-2 mt-2">';
                echo "<p><b>$record[title]</b> </p><br>";
                echo '<div class="card-body ">';
                echo "<img src=img/$record[image] class='img-responsive img-thumbnail'>";
                echo '</div>';
               echo '<div class="card-footer">';
                echo "$amount pieces x $record[price] $ = <span class='btn-warning btn-sm h5'>" .$amount*$record['price']. " $</span>";
                echo "<a href='delete.php?id_product=$id_product\'><i class='btn btn-danger btn-sm float-right'>Remove</i></a>";
                echo '</div>';
                echo "<form method='get' action='cart.view.php?$id_product'>";
                echo "<input type='submit' name='update' size='3'class='btn btn-warning btn-sm float-left '  value='Change amount'></input>";
                echo "<input type='text' name='amountn' size='3'class='btn-sm float-left ' ></input>";
                echo "<input type='hidden' name='id_product' value='$id_product'>";
                echo '</form>';
                echo '</div>';
               echo '</div>';
              
               //echo "<p><b>$record[title]</b> </p><img src=img/$record[image] class=img-responsive img-thumbnail>-  $amount pieces x $record[price] eur =".$amount*$record['price']." eur (<a href=\"delete.php?id_product=$id_product\">delete from cart</a>)<hr />";
         
            }

       }
   }

}

if($sum!=0) {
   echo '<div class="col-4">';
   echo '<div class="card mb-2 mt-1">';
   echo "<h4 class='mt-3'>Total: $sum $ </h4>";
   echo "
     
      <a href='checkout.php'><span class='btn btn-warning btn-lg float-right'>Check Out</span></a>
   </form></div>";
   
   echo '</div>';
   echo '</div>';
   
  $_SESSION['sum'] = $sum;
   
}






}





?>
 

<?php require "partials/footer.php"; ?>


