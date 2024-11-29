<?php
include 'connection.php';
if( $_GET["id"] !=null)
 {
    $id = $_GET["id"];
    $data = "DELETE FROM item  WHERE  id='$id'";
    echo $data;
    $res=mysqli_query($connect,$data);
  
   
   
    if($res)
    {
    
    header("location:item.php");
   
    echo "deleted item data item";
    }

    }  
    ?>