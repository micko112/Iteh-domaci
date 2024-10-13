<?php


$host="localhost";
$db="kolokvijumi";
$user="root";
$pass="";


$conn=new mysqli($host,$user,$pass,$db);

if($conn->connect_errno){
    exit("Failed connection, error:".$conn->connect_errno); 
}

?>
