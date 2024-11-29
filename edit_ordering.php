
<!DOCTYPE html>
<html lang="en">
<?php
include('header.php');
    ?>
<style>
    
    #new{
        padding-top:1rem;
    }
</style>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ultimate Invoicing System</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
<!--modal code-->




<?php
include('connection.php');
//$data[];
// $id=$_GET['id'];
$id= $_GET["cat"];
$sql="SELECT * FROM `customer` WHERE id='$id'";
$result=$connect->query($sql);
if ($result->num_rows > 0) 
{
    // output data of each row
    $data=$result->fetch_all(MYSQLI_ASSOC);
    foreach($result as $data) 
    {
     // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    
  
    //    echo  $row['partdescription']; 
?>
<?php

?>
      <!--modal code-->
     
                <!-- Begin Page Content -->
                <form class="form-horizontal" name="insertstore" method="post"  >
                <div class="container-fluid">
                    
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Edit Order data</h1>
                    
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Customer</h6>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                    <div class="col-sm-3">Name
                                            <input name="name"type="text" required class="form-control form-control-user" id="exampleLastName"
                                                value="<?php echo $data['name']?>"placeholder="colorname">
                                        </div>
                                        <div class="col-sm-3">Address
                                            <input name="address" required type="text" class="form-control form-control-user" id="exampleLastName"
                                                value="<?php echo $data['address']?>"placeholder="description">
                                        </div>
                                        <div class="col-sm-3">State
                                            <input name="state"type="text" class="form-control form-control-user" id="exampleLastName"
                                                value="<?php echo $data['state']?>"placeholder="description">
                                        </div>
                                        <div class="col-sm-3">Gstin
                                            <input name="gstin"type="text" class="form-control form-control-user" id="exampleLastName"
                                                value="<?php echo $data['gstin']?>"placeholder="description">
                                        </div>
                                       
                                    </div>
                                    
                                    <div id="new">
                                    <!-- <input type="hidden" class="form-control" name="add" id="add" value="edit"> -->
                                    <input name="id"type="hidden"  value="<?php echo $data['id']?>">  
                                    <input name="stylename_item"type="hidden"  value="<?php echo $stylename_item?>">    
                                    <button name="submit1" type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="">Update</button>
                                    <!-- <a href="#" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-flag"></i>
                                        </span>
                                        <span class="text">Add New</span>
                                    </a> -->
                                    <!-- <div id="save"> -->
                                </div></div>
                                    
                                </div>
                            </div>
                        </div>
            </form>
            <?php 
           
 //$edit = $_POST['add'];
//  echo  "Update record ".$id;
//  echo  "edit block ".$edit;
 if(isset($_POST['submit1']))
 {
    $id = $_POST['id'];
    echo  "edit block2 ".$id;
    $orderno= $_POST['name'];
    // echo $colorname;

    $description = $_POST["address"];
    $orderdate=$_POST["state"];
    $ddate=$_POST['gstin'];
    // $contact_number= $_POST["contact_number"];
    // $address = $_POST["address"];
    // UPDATE `ordering` SET `orderno`='$orderno',`description`='$description',`orderdate`='$orderdate',`ddate`='$ddate' WHERE 1
    $data = " UPDATE `customer` SET `name`='$orderno',`address`='$description',`state`='$orderdate',`gstin`='$ddate' WHERE id='$id'";
    echo $data;
    $res=mysqli_query($connect,$data);
    if($res)
    {
        //window.alert('Sample data item is updated');   
    //header("location:sampling_add_item.php");
    // $stylename_item = $_SESSION['name'];
    echo '<script>alert("Order is updated")</script>';
    $url="billing.php";
    echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL="'. $url .'">';
    //  header("location:fabricator.php");
    //echo "inserted sample data item";
    echo "Updated sample data";
    }
    //
    }  ?>
    <?php
    } 
} ?>

                    <!-- Page Heading -->
                   
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>