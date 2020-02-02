<?php require "partials/head.php"; ?>
<?php require "partials/navbar.php"; ?>

<?php 
if (!isset($_SESSION['id_user'])) {
	header('Location: loginsession.view.php');
}

?>
<div class="container">
            <div class="card mb-2 mt-2 float-left">
                    <p class="h6">Hello <?php echo $_SESSION['name'] ?> <br>See all your orders</p>
                <form action="user.view.php" method="post">
                        <div  class="card-body">
                             See<select name='name'>
                                <option value='1' stud_name='sre'>Ordered</option>
                                <option value='2' stud_name='sam'>In progress</option>
                            <option value='3' stud_name='john'>Purchased</option>
                    </select>
                    <button type="submit" name="check" class="btn btn-warning ">Check your Orders</button>
                </form>
                </div>
                </div>
            <table class=' table table-borderless'>
            <thead>
            <tr>
            <th scope='col'><?php echo $_SESSION['name'] ?></th>
            <th scope='col'>Date </th>
           <th scope='col'>Total amount</th>
          <th scope='col'>Status</th>
            </tr>
            </thead>
            <?php 
 if(isset($_POST['check'])){

    $name = mysqli_real_escape_string(db(),$_POST['name']);
    if($name == 1){
        $name  = "Ordered";
    }elseif($name == 2){
        $name = "In progress";
    }elseif($name == 3){
        $name = "Purchased";
    }
     $sql = "SELECT date_time,total_price,status FROM cart_order WHERE status = '$name'";
   $result = mysqli_query(db(),$sql) or mysqli_error(db(),$sql);
     if (mysqli_num_rows($result)>0)
     {
   
        while ($record = mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
           
      
      
     echo     " <tbody>";
     echo        " <tr>";
     echo          "<th scope='row'>#</th>";
     echo        " <td>$record[date_time]</td>";
     echo        " <td>$record[total_price] $</td>";
     echo         " <td>$record[status]</td>";
     echo        "</tr>";
     echo          " </tbody>";
   
       
        }

   }
}


?>
        

                
            </tbody>
            </table>   
</div>


<?php require "partials/footer.php"; ?>