<?php

require_once "functions.php";




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
                        $sql = "INSERT INTO user VALUE(NULL,1,'$name','$email','$password_temp','$vkey',now())"; 
                        $query = mysqli_query(db(),$sql);
                    
                        if($query){
                            $to = $email;
                            $subject = "Email Verification";
                            $message = "<a href='http://localhost/verify.php?vkey=$vkey'>Register Account</a>";
                            $headers = "From :  zaricsrdjan10@gmail.com";
                            $headers .= 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/plain; charset=UTF-8' . "\r\n"; 
                
                            mail($to,$subject,$message,$headers);
                
                            header('Location: thankyou.php');
                
                
                
                        }else{
                            mysqli_error($query);
                        }
                        
                    
            
    
    
                
                
               
            }
    

      