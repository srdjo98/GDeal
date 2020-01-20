<?php
require_once "functions.php";
require "partials/head.php"; 



$name = mysqli_real_escape_string(db(),$_POST['name']);
$email = mysqli_real_escape_string(db(),$_POST['email']);
$password = mysqli_real_escape_string(db(),$_POST['password']);

$password_temp = SALT1 . "$password" . SALT2;


    if(empty($name) || empty($email) || empty($password)){

        header('Location: register.view.php?register=empty');
        exit();      

    }else{

            
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header('Location: register.view.php?register=email');
                exit();
                
            }

            
                    if(!empty($email)){
                    $sql="SELECT email from user WHERE email='$email'"; 
                    $query=mysqli_query(db(),$sql);
                    if(mysqli_num_rows($query) > 0){
                        header('Location: register.view.php?register=emko');
                        exit();
                     
                        }   
                    }
                    
                    if(!empty($name) and strlen($name)<5){
                        $sql="SELECT name from user WHERE name ='$name' "; 
                        $query=mysqli_query(db(),$sql);
                        if(mysqli_num_rows($query) > 0){
                            header('Location: register.view.php?register=name');
                            exit();
                            
                            }
                    }

                        $vkey = md5(time().$name);
                        $sql = "INSERT INTO user(id_user,id_groups,name,email,password,vkey,verified,joined) VALUE(NULL,1,'$name','$email','$password_temp','$vkey',0,now())"; 
                        $query = mysqli_query(db(),$sql);
                        
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

                                $mail->addAddress($email, $name);

                                $mail->isHTML(true);

                                $mail->Subject = "Verify  your email address";
                                $mail->Body = "<div>
                                <h3 style='color:black;font-size:22px'>Click here to confirm your email</h3><br>
                               
                                <a href='http://localhost/oglasv/verify.php?vkey=$vkey' style='text-decoration: none;background-color:white;color:black;padding:10px;font-size:16px;border:2px solid #008CBA'>Confirm your email</a>
                                
                                </div>";
                                $mail->AltBody = "This is the plain text version of the email content";

                                if(!$mail->send()) 
                                {
                                    echo "Mailer Error: " . $mail->ErrorInfo;
                                } 
                                else 
                                {
                                    echo '<script type="text/javascript">window.location = "thankyou.php"</script>';
                                }
                                                
                            
                
                            
                
                
                
                        }else{
                           die(mysqli_error(db()));
                        }
                        
                    
            
    
    
                
                
               
            }
    

      










        
