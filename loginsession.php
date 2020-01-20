<?php 

require_once "functions.php";

if(isset($_SESSION['id_user'])){
    include "loginsession.view.php";
}else{
    header('Location: index.php');

}