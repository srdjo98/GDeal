</style>
<nav class="navbar navbar-expand navbar-dark bg-dark ">
            <a href="index.php" class="navbar-brand">GDeal </a>    
            <ul class="navbar-nav ml-auto h6">
            <?php
                if(isset($_SESSION['id_user'])){
                    if($_SESSION['id_user'] == 1){
                        require_once "partials/navbar-admin.php";
                    }else{
                        require_once "partials/navbar-logged.php";
                    }
                    
                }else{
                    require_once "partials/navbar-login.php";
                }
            ?>
            
            </ul>
    </nav>
