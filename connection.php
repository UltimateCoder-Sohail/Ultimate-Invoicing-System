<?php
//coded copyright free
$server="localhost";//servername
$user="root";//username
$password="";//password 
$data="ultimateerp";//database name

$connect =new mysqli($server,$user,$password,$data);//connecting database
if($connect->connect_error)//checking connection
{
  // echo "connection not successfull";
}
else
// echo "connection successful";


?>