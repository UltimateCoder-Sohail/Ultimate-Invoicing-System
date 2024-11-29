<?php
include('connection.php'); 
$item= $_POST['add'];
if($item =="add")
{
    $product_name = $_POST["product_name"];
    $hsn_code = $_POST["hsn_code"];
    $rate = $_POST["rate"];
    $quantity = $_POST["quantity"];
    
    $sql="select * from item where product_name='$product_name' ";
    $res=mysqli_query($connect,$sql);
    $count= mysqli_num_rows($res);

    if($count==0)
    {
        $data="INSERT INTO item ( `product_name`, `hsn_code`, `rate`, `quantity`)  VALUES ('$product_name','$hsn_code','$rate','$quantity')";
        // echo $data;
        $res=mysqli_query($connect,$data);
       
        // `q1022` int(11) DEFAULT NULL,
        // $sql="ALTER TABLE survey_forms ADD $q_no varchar(255)";
        
        if($res)
        {
        header("location:item.php");
        echo "inserted item data";
        }
        
    }
    else
    {
    echo '<script>alert("Question all ready exist")</script>';
    $url="item.php";
    echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL="'. $url .'">';  
    } 
}

function save_log($user_id,$action_made){

    include 'connection.php';   

    $sql1 = "INSERT INTO `audit_logs` (`user_id`,`action_made`) VALUES ('$user_id','$action_made')";
    echo $sql1;
    $res=mysqli_query($connect,$sql1);
    return true;
  }
?>

