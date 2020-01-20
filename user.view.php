<?php session_start() ?>
<?php require "partials/head.php"; ?>
<?php require "partials/navbar.php"; ?>
<?php 
    if(isset($_SESSION['id'])){
        $oglasi = getAlluserADS($_SESSION['id']);
    }else{
        header('Location: index.php');
    }
?>
<div class="container">
    <div class="row">
        <div class="col-10 offset-1">
            <div class="col-row">
                <div class="col-6 offset-3 mt-3 mb-5">
                    <a href="" class="btn btn-info from-control">
                        Novi Oglas
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php foreach($oglasi as $oglas): ?>
            <div class="col-4">
                    <div class="card mb-2 mt-2">
                        <div class="card-heder">
                            <a href="" class="btn btn-secondary btn-sm">
                                <?php echo $oglas['category']; ?>
                            </a>
                        </div>
                        <div class="card-body text-center">
                                <?php echo $oglas['title']; ?>
                            
                        </div>
                        <div class="card-footer">
                        <a href="" class="btn btn-warning btn-sm float-left">
                                <?php echo $oglas['name']; ?>
                        </a>
                        <a href="" class="btn btn-danger btn-sm float-right">
                                <?php echo $oglas['price']; ?>
                        </a>
                        </div>
                    </div>
                </div>
        <?php endforeach; ?>
    </div>
</div>
<?php require "partials/footer.php"; ?>