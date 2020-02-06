<?php require "partials/head.php"; ?>
<?php require "partials/navbar.php"; ?>
<?php 
$query = "SELECT * FROM `category`";
$result1 = mysqli_query(db(), $query);
?>
<?php $product = getAll(); ?>
                <div class="card mb-2 mt-2 float-right">
                    <p class="display-4">Add new Product </p>
                    <form enctype="multipart/form-data" action="insert.php" method="post">
                        <div  class="card-body">
                           
                             Category <select name ="id_cat">

                            <?php while($row1 = mysqli_fetch_array($result1)):;?>

                            <option  value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
                            
                            
                             <?php endwhile;?>
                            </select><br><br>
                            
                           
                            Title <input type="text" name="title"><br><br>
                                
                        
                            Image  <input type="file" name="file"  ><br><br>
                            
                            Description <br>
                            <textarea name="description"> </textarea><br><br>
                            
                        </div>
                        <div class="card-footer">
                        
                        Price <input type="text" name="price" size="4"><br>
                        
                        </div><br>
                        <button type="submit" name="insert" class="btn btn-warning ">Insert</button>
                       
                    </form>     
                </div>
                <?php 
                $query = "SELECT * FROM `category`";
                $result1 = mysqli_query(db(), $query);
                ?>
                <div class="card mb-2 mt-2 float-right">
                    <p class="display-4">Add new Category </p>
                    <form action="insert.php" method="post">
                        <div  class="card-body">
                            Add new Category <input type="text" name="newc"><br><br>
                            Category <select name ="id_cat">

                            <?php while($row1 = mysqli_fetch_array($result1)):;?>

                            <option  value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
                            
                            
                             <?php endwhile;?>
                            </select><br><br>
                                                    
                        </div><br>
                        <button type="submit" name="insert" class="btn btn-warning ">Insert</button>
                        <button type="submit" name="delete" class="btn btn-danger float-right">Delete</button>
                    </form>     
                </div>
<?php foreach($product as $p): ?>
    <div class="col-4">
                    
                    <div class="card mb-2 mt-2">
                    <p class="display-4">Update & Delete </p>
                    <form enctype="multipart/form-data"  action="change.php" method="post">
                        <div name="title" class="card-body text-center">
                            Update Title <input type="text" name="title"><br>
                                <?php echo $p['title']; ?>
                            <br>
                            Update Image  <input type="file" name="file"  ><br><br>
                            <img src="img/<?php echo $p['image']; ?>" name="image" class="img-responsive img-thumbnail"><br>

                            Update Description <br> <textarea type="text" name="description"></textarea><br>
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


