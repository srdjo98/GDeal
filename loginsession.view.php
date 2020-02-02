<?php require "partials/head.php"; ?>
<?php require "partials/navbar.php"; ?>

<?php 
if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = [];
}
?>


<?php $product = getAll(); ?>
<div class="container">

    
    <div class="row">
    
   
        <div class="col-10 offset-1">
            <p class='display-4 text-center mt-3 col-12 '>All Products </p>
            <form action="loginsession.view.php" method="get">
            <input type="text" name="search" placeholder="search" class="form-control"><br>
            <input type="submit" name='submit' class="btn btn-primary form-control" value="Search">
            </form>
           
            <?php 
            $fullUrl = "http:://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if(strpos($fullUrl, "search=nothing2") == true){
                echo "<p style='color:red' class='mt-2'>Product does not exits!</p>";
            }elseif(strpos($fullUrl, "search=nothing") == true){
                echo "<p style='color:red' class='mt-2'>Please fill in the search field!</p>";
            }
            ?>
           <table class="table">
            <thead>
                <tr>

                <tr>
  

<br />
<div class='row'>
    <?php
    

$sql = "SELECT * FROM category ORDER BY name ASC";
 $result = mysqli_query(db(),$sql) or die(mysqli_error(db()));

  if (mysqli_num_rows($result)>0)
  {
     echo "<div class='list-group col-12 col-xl-4 col-md-4 ' style='left:10px;width:200px;'>";
     echo "<button type='button' class='list-group-item list-group-item-action active mb-3'>Category</button>";
      while ($record = mysqli_fetch_array($result,MYSQLI_BOTH))
     
  


      echo "<a href=\"products.php?id_category=$record[id_category]\"><button type='button' class='list-group-item list-group-item-action  ' style='margin-top:-26px;'
      >$record[name]</button></a><br />";
      
  }
     echo "</div>";
  
?>
    </div>

     <?php
     
    
    
    if(isset($_GET['submit']) AND !empty($_GET['submit'])){ 

    $search = $_GET['search'];
    
    if(!empty($search)){
    $sql = "SELECT * FROM product WHERE (`title` LIKE '%".$search."%') OR (`price` LIKE '%".$search."%')  OR (`description` LIKE '%".$search."%')";
    $result = mysqli_query(db(),$sql);
  
    if (mysqli_num_rows($result) > 0) {
         
       
        while ($record = mysqli_fetch_assoc($result)) {


      
            echo "<p class='display-4 text-center mt-3 '>Product $record[title] </p>";
            
            echo "<div class='col-12'>";
             echo   "<div class='card mb-2 mt-2  '>";
                
                  echo  "<div class='card-body text-center ' >";
                  echo "<p><b>$record[title]</b> </p><br>";

                       
                       echo "<img src=img/$record[image] class='img-responsive img-thumbnail'>";
                    
                        echo $record['description'];
                    echo "</div>";
                    echo "<div class='card-footer'>";
                    echo "<p class='float-left'>Product is available in the store</p>";
                    echo "<a href='#item' class='btn btn-danger btn-sm float-right'>";
                         echo "<span>$record[price] $</span>";
                    echo "</a>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "<hr>";
         
           

             
           
        }
        
       
    }else {
        header('Location: loginsession.view.php?search=nothing2');
        exit();
    }


}else {
        header('Location: loginsession.view.php?search=nothing');
            
        }
    }


?>
            </tr>
            </thead>
            </table>
            
            <div class="row">
             <?php foreach($product as $p): ?>
              
        
                <div class="col-xl-6 col-12 col-md-6">
                <form action="cart.php" method="post">
                    <div class="card mb-3 mt-2 col-12 " id="item" >
                    <div class="card-body">
                        <div class="card-heder">
                            <a href="" class="btn btn-primary btn-sm btn-block">
                                <?php echo $p['name']; ?>
                            </a>
                        </div>
                        <div name="title" class="card-body text-center">
                                <?php echo $p['title']; ?>
                           
                            <img src="img/<?php echo $p['image']; ?>" name="image" class="img-responsive img-thumbnail">
                        <div class="card-text"><?php echo $p['description']; ?></div>
                        </div>
                        <div class="card-footer">
                        <input type="hidden" name="id_product" value="<?php echo $p['id_product'] ?> " />
                        <button type="submit" class="btn btn-warning btn-sm float-left" value = "<?php  echo $p['title'] ?> added to the cart !" name="add" onClick='addItem(this)'>
                                Add to cart
                        </button><br><br>
                        amount: <input type="text" name="amount" size="5" />
                        <a href="" name="price"   class="btn btn-danger btn-sm float-right ">
                                <?php echo $p['price']; ?>  $
                        </a>
                        </div>
                        </div>
                        </form>     
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<script>
function addItem(elmt) {
            alert(elmt.value);
            }
</script>
<?php require "partials/footer.php"; ?>