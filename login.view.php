<?php require "partials/head.php"; ?>
<?php require "partials/navbar.php"; ?>
<div class="container" >
    <div class="row mt-3">
        <div class="col-6 offset-4">
        <form action="login.php" method="post">
                <input type="email" name="email" placeholder="email" class="form-control"><br>
                <input type="password" name="password" placeholder="password" class="form-control"><br>
                <button type="submit" class="btn btn-secondary form-control">Login</button>
            </form> 
        <?php
        if(isset($_SESSION['id_user'])){
            session_destroy();
        }
        $fullUrl = "http:://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if(strpos($fullUrl, "login=sucesse") == true){
            echo "<p style='color:green' class='mt-2'>Your email is verifyed !</p>";
        }elseif(strpos($fullUrl, "login=email") == true){
            echo "<p style='color:red' class='mt-2'>Invalid email!</p>";
        }elseif(strpos($fullUrl, "login=password") == true){
            echo "<p style='color:red' class='mt-2'>Wrong password!</p>";
        }
        
        ?>
        </div>
    </div>
</div>
<?php require "partials/footer.php"; ?>