

<?php 


  require "db.php";

 
  $date = date("Y-m-d H:i:s");   
  $cart_order = $db->prepare("INSERT INTO cart_order(id_cart_order,id_user,date_time,order_text,total_price,status) VALUES(:id_cart_order,:id_user,:date_time,:order_text,:total_price,:status)");
  $cart_order->execute([
    'id_cart_order' => NULL,
    'id_user' => $_SESSION['id_user'],
    'date_time' => $date,
    'order_text' => $_SESSION['txt'],
    'total_price' => $_SESSION['sum'],
    'status' => "purchased"

  ]);

  $id_card_order = $db->lastInsertId();
  if($cart_order){
    
    foreach($_SESSION['cart'] as $id_product => $amount){
      $sql = "SELECT price FROM product WHERE id_product = '$id_product'";
      $query = $db->query($sql);
      $row = $query->fetch();
      

      $cart_order_item = "INSERT INTO cart_order_item (id_cart_order_item,id_cart_order,id_product,amount,price)
      VALUES (NULL,$id_card_order,$id_product,$amount,$row[0])";
      $db->exec($cart_order_item);
    }

    unset($_SESSION['cart']);
  

}

  

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <title>GDeal - cheap and good</title>
</head>
<div class="jumbotron text-center">
  <h1 class="display-2">Thank You <?php echo $_SESSION['name'];?></h1>
  <p class="lead display-5"><strong>For your purchase</strong> </p>
  <hr>
  <p>
    Having trouble? <a href="">Contact us</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="gdeal/loginsession.view.php" role="button">Continue shoping</a>
  </p>
</div>
<?php require "partials/footer.php"; ?>