</style>
<nav class="navbar navbar-expand-lg">
            <a href="index.php" class="navbar-brand">GDeal </a> 
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>   
             <div class="collapse navbar-collapse" id="navbarNav">
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
 