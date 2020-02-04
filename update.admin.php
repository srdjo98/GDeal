<?php
require "functions.php";

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string(db(),$_POST['status']);
    $id_user = mysqli_real_escape_string(db(),$_POST['id_user']);
    $id_cart = mysqli_real_escape_string(db(),$_POST['id_cart']);
   
    
    if($name == 1){
        header('Location: status.php');
                        exit();

    }elseif($name == 2){
        $name = "proccessing";
        
     $sql = "UPDATE cart_order SET status = '$name' WHERE id_cart_order = '$id_cart' AND id_user= '$id_user'";
     $query = mysqli_query(db(),$sql) or die(mysqli_error(db()));
     
    if($query){
        header('Location: status.php');
        exit();
    }


    }elseif($name == 3){
        $name = "sent";
    
    $sql1 = "SELECT email FROM user WHERE id_user = '$id_user'";
    $query = mysqli_query(db(),$sql1) or die(mysqli_error(db()));
    $email = mysqli_fetch_row($query);
   
    $sql = "UPDATE cart_order SET status = '$name' WHERE id_cart_order = '$id_cart' AND id_user= '$id_user'";
    $query = mysqli_query(db(),$sql) or die(mysqli_error(db()));
  
   if($query){
    require("PHPMailer-master/src/PHPMailer.php");
    require("PHPMailer-master/src/SMTP.php");
    require("PHPMailer-master/src/Exception.php");
    require("PHPMailer-master/credit.php");

    $mail = new PHPMailer\PHPMailer\PHPMailer();

    //Enable SMTP debugging. 
    $mail->SMTPDebug = 3;                               
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();            
    //Set SMTP host name                          
    $mail->Host = "smtp.gmail.com";
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;                          
    //Provide username and password     
    $mail->Username = EMAIL;                 
    $mail->Password = PASS;                           
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "tls";                           
    //Set TCP port to connect to 
    $mail->Port = 587;                                   

    $mail->From = EMAIL;
    $mail->FromName = "GDeal Great deal only today";

    $mail->addAddress($email[0]);

    $mail->isHTML(true);

    $mail->Subject = "Your order was sent";
    $mail->Body = "<div>
    <h3 style='color:black;font-size:22px'>Today your order was sent</h3><br>
    </div>";
    $mail->AltBody = "This is the plain text version of the email content";

    if(!$mail->send()) 
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } 
    else 
    {
        echo '<script type="text/javascript">window.location = "status.php"</script>';
    }
                    

}

   }




}