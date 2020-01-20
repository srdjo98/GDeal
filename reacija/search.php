<?php
require "connection.php"; 

$search = $_GET['search'];

$sql =  "SELECT humans.first_name,numans.last_name,cards.card_number
        FROM humans 
        INNER JOIN cards 
        ON cards.human_id = humans.id
        WHERE cards.card_number = '$search'
        OR humans.first_name = '$search'";
        
$query = mysqli_query($db,$sql);
$result = mysqli_fetch_assoc($query);
echo $result['first_name'] ." ".$result['last_name'];