<?php
include('header.php');
    ?>
<!DOCTYPE html>
<html lang="en">

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

    <title>SB Admin 2 - Blank</title>

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
<?php
$id= $_GET["cat"];
$sql="SELECT * FROM `item` WHERE id='$id'";
$result=$connect->query($sql);
if ($result->num_rows > 0) 
{
    // output data of each row
    $data=$result->fetch_all(MYSQLI_ASSOC);
    foreach($result as $data) 
    {
?>
<?php

?>
                <!-- Begin Page Content -->
            <form class="form-horizontal" name="insertstore" method="post"  >
                <div class="container-fluid">
                    
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Edit Question</h1>
                    
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Customer</h6>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                    <div class="col-sm-3 ">Product Name
                                            <input  name="product_name"type="text" required class="form-control form-control-user" id="exampleLastName"
                                                value="<?php echo $data['product_name']?>"placeholder="Question No">
                                        </div>
                                   
                                        <div class="col-sm-3">HSN Code
                                            <input name="hsn_code"type="text" class="form-control form-control-user" id="exampleLastName"
                                                value="<?php echo $data['hsn_code']?>"placeholder="description">
                                        </div>
                                        <div class="col-sm-3"> Rate
                                            <input name="rate" required type="number" class="form-control form-control-user" id="exampleLastName"
                                                value="<?php echo $data['rate']?>"placeholder="description">
                                        </div>
                                        <div class="col-sm-3">Quantity
                                            <input name="quantity"type="number" class="form-control form-control-user" id="exampleLastName"
                                                value="<?php echo $data['quantity']?>"placeholder="description">
                                        </div>
                              
                                    </div>
                                    
                                    <div id="new">   
                                    <input name="id"type="hidden"  value="<?php echo $data['id']?>">       
                                    <button name="submit1" type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="">Update</button>
                                    <button onclick="window.location.href='item.php'" name="back" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal" data-whatever="">Back</button>
                                </div>
                            </div>          
                        </div>
                    </div>
                </div>
            </form>
<?php 
 if(isset($_POST['submit1']))
 {
    $id = $_POST['id'];
    echo  "edit block2 ".$id;
    // $orderno= $_POST['name'];
    $product_name=$_POST['product_name'];
    $hsn_code=$_POST['hsn_code'];
    $rate=$_POST['rate'];
    $quantity=$_POST['quantity'];
    $data = "UPDATE `item` SET `product_name`='$product_name',`hsn_code`='$hsn_code',`rate`='$rate',`quantity`='$quantity' WHERE id='$id'";
    $res=mysqli_query($connect,$data);
            if($res)
            {
                echo '<script>alert("Question is updated")</script>';
                // $url="mcq.php";
                echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
                echo '<META HTTP-EQUIV="refresh" content="0;URL="'. $url .'">';
                echo "inserted item data item";
                echo "Updated item data";
            }
        }  
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
             <?php include('footer.php'); ?>
            
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