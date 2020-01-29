<?php require "partials/head.php"; ?>
<?php require "partials/navbar.php"; ?>

<?php 
if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = [];
}
?>


<?php $product = getProduct(); ?>
<div class="container">
<div class="row">
             <?php foreach($product as $p): ?>
              
        
                <div class="col-xl-6 col-12 col-md-6 ">
                <form action="cart.php" method="post">
                    <div class="card mb-2 mt-2 col-12" id="item" >
                    <div class="card-body">
                        <div class="card-heder">
                            <a href="" class="btn btn-secondary btn-sm btn-block">
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
                        <input type="hidden" name="id_category" value="<?php echo $p['id_category'] ?>">
                        <button type="submit" class="btn btn-warning btn-sm float-left" name="add">
                                Add to cart
                        </button><br><br>
                        amount: <input type="text" name="amount" size="5" />
                        <a href="" name="price"   class="btn btn-danger btn-sm float-right ">
                                <?php echo $p['price']; ?>
                        </a>
                     </div>
                    </div>
                 </form>     
                 </div>
            </div>
        <?php endforeach; ?>
     </div>
 </div

<?php require "partials/footer.php"; 