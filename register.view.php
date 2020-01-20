<?php require "partials/head.php"; ?>
<?php require "partials/navbar.php"; ?>
<div class="container" >
    <div class="row mt-3" >
        <div class="col-6 offset-4">
            <form action="register.php" method="post">
                <input type="text" name="name" placeholder="name" class="form-control"><br>
                <input type="email" name="email" placeholder="email" class="form-control"><br>
                <input type="password" name="password" placeholder="password" class="form-control"><br>
                
                <button type="submit" class="btn btn-primary form-control">Register</button>
            </form>
        <?php 
        $fullUrl = "http:://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if(strpos($fullUrl, "register=empty") == true){
            echo "<p style='color:red' class='mt-2'>You did not fill in all fields!</p>";
        }elseif(strpos($fullUrl, "register=char") == true){
            echo "<p style='color:red' class='mt-2'>You used invalid characters!</p>";
        }elseif(strpos($fullUrl, "register=email") == true){
            echo "<p style='color:red' class='mt-2'>You used invalid email!</p>";
        }elseif(strpos($fullUrl, "register=name") == true){
            echo "<p style='color:red' class='mt-2'>Name already taken!</p>";
        }
        elseif(strpos($fullUrl, "register=emko") == true){
            echo "<p style='color:red' class='mt-2'>Email already taken!</p>";
        }
        
        ?>
        </div>
    </div>
</div>
<?php require "partials/footer.php"; ?>