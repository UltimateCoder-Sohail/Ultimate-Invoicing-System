<?php
// Start the session
//session_start();
?>
<?php
include 'connection.php';
//include('header.php');
?>

<?php
// insert  sample 
$item= $_POST['add'];
$orderno= $_POST["order_item"];
$_SESSION["orderno"] = $orderno;
echo $item;
if($item =="add")
{
    $name = $_POST["name"];
    $address = $_POST["address"];
    $state = $_POST["state"];
    $gstin = $_POST["gstin"];
   
    $sql="select * from customer where name='$name' ";
    $res=mysqli_query($connect,$sql);
    $count= mysqli_num_rows($res);

    if($count==0)
    {
        $data="INSERT INTO customer (name, address,state, gstin)  VALUES ('$name','$address' ,'$state', '$gstin')";
        $res=mysqli_query($connect,$data);
        if($res)
        {
        header("location:billing.php");
        //alert("Style Name "+ $stylename);
        
         echo "inserted sample data";
        }

    }
    else
    {
    echo '<script>alert("Order all ready exist")</script>';
    $url="billing.php";
    echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL="'. $url .'">';  
    } 
}
 // insert  sample data items
//  if($item =='item'){
    
//     echo $orderno;
//     $color= $_POST["color"];
//     $pcs = $_POST["pcs"];
       
//     $sql="select id from sampling_item where partdescription='$orderno' ";
//     $res=mysqli_query($connect,$sql);
//     $count= mysqli_num_rows($res);
//     $orderno = $_SESSION["orderno"];
//         if($count==0){
//     $data="INSERT INTO billing_item (orderno,color, pcs) VALUES ('$orderno', '$color', '$pcs')";
//     echo $data;
//     $res=mysqli_query($connect,$data);
//     if($res)
//     {
//     //header("location:sampling_add_item.php");
//     // header("location:billing_add_item.php?cat=$orderno");
//     echo "inserted order data item";
//     }

//     }
//  }

  // edit/update  order data items

 $id = $_POST['id'];
 //$edit = $_POST['add'];
//  echo  "Update record ".$id;
//  echo  "edit block ".$edit;
 if($item == 'edit' && $id !=null)
 {
    echo  "edit block2 ".$id;
    $stylename_item= $_POST["stylename"];
    echo $stylename_item;

    $test = $_POST["stylename_item"];
    $color= $_POST["color"];
    $pcs = $_POST["pcs"];
   
    $data = "UPDATE ordering_item SET stylename ='$stylename_item',color='$color', pcs='$pcs' WHERE id='$id'";
    echo $data;
    $res=mysqli_query($connect,$data);

    $data1 = "UPDATE current_issuing_item SET stylename ='$stylename_item',color='$color', pcs='$pcs' WHERE id='$id'";
    echo $data;
    $res=mysqli_query($connect,$data1);

    save_log($_SESSION["username"],"Edit ordering_item ".$stylename_item);
    
    if($res)
    {
        //window.alert('Sample data item is updated');   
    //header("location:sampling_add_item.php");
    //$stylename_item = $_SESSION["stylename_item"] ;
     header("location:order_add_item.php?cat=$test");
    //echo "inserted sample data item";
    //echo "Updated sample data";
    }
    //
    }  
 // end edit/update  sample data items
 // delete  sample data items
  if($_GET["add"] == 'd' && $_GET["id"] !=null)
  {
   
    echo '<script>alert("delete ordering_item data item")</script>';
    $stylename_item = $_GET["cat"];
    $id = $_GET["id"];
    echo  $stylename_item;
     $data = " DELETE FROM ordering_item  WHERE   id='$id' ";
     echo $data;
     $res=mysqli_query($connect,$data);
     $data1 = " DELETE FROM current_issuing_item   WHERE id='$id'";
     echo $data1;
     $res=mysqli_query($connect,$data1);
     if($res)
     {
     //header("location:sampling_add_item.php");
     //$stylename_item = $_SESSION["stylename_item"] ;
     header("location:order_add_item.php?cat=$stylename_item");
     //echo "inserted sample data item";
     echo "delete ordering_item data item";
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

