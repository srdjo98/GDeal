<?php require "partials/head.php"; ?>
<?php require "partials/navbar.php"; ?>
<?php $product = getAll(); ?>
                <div class="card mb-2 mt-2 float-right">
                    <p class="display-4">Add new Product </p>
                    <form action="insert.php" method="post">
                        <div  class="card-body">
                            Category <input type="text" name="name"> | monitor  laptop  mouse  keyboard<br><br>
                            Title <input type="text" name="title"><br><br>
                                
                        
                            Image <input type="text" name="image"><br><br>
                            

                            Description <input type="text" name="description"><br><br>
                            
                        </div>
                        <div class="card-footer">
                        
                        Price <input type="text" name="price" size="4"><br>
                        
                        </div><br>
                        <button type="submit" name="insert" class="btn btn-warning ">Insert</button>
                       
                    </form>     
                </div>
<?php foreach($product as $p): ?>
    <div class="col-4">
                    
                    <div class="card mb-2 mt-2">
                    <p class="display-4">Update & Delete </p>
                    <form action="change.php" method="post">
                        <div name="title" class="card-body text-center">
                            Update Title <input type="text" name="title"><br>
                                <?php echo $p['title']; ?>
                            <br>
                            Update Image <input type="text" name="image">
                            <img src="img/<?php echo $p['image']; ?>" name="image" class="img-responsive img-thumbnail"><br>

                            Update Description <input type="text" name="description"><br>
                            <?php echo $p['description']; ?>
                        </div>
                        <div class="card-footer">
                        <input type="hidden" name="id_product" value="<?php echo $p['id_product'] ?>" />
                        Update Price <input type="text" name="price" size="4">
                        <a href="" name="price" class="btn btn-danger btn-sm float-right">
                        
                                <?php echo $p['price']; ?>
                        </a>
                        </div><br>
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                        <button type="submit" name="delete" class="btn btn-danger float-right">Delete</button>
                        </form>     
                    </div>
                    
    </div>
    <?php endforeach; ?>
<?php require "partials/footer.php"; ?>


