<?php
include('connection.php');
if( $_GET["id"] !=null)
 {
    $id = $_GET["id"];
    $stylename_item = $_GET["cat"];
    $data = "DELETE FROM customer  WHERE  id='$id'";
    echo $data;
    $res=mysqli_query($connect,$data);
    if($res)
    {
    //header("location:sampling_add_item.php");
    header("location:billing.php?cat=$stylename_item");
    //echo "inserted sample data item";
    echo "delete order data item";
    }

    }  
    ?>