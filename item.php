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


    

                <!-- Begin Page Content -->
            <form action="add_item.php" method="post">
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Item</h1>
                    
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card shadow mb-4">
                                <!-- <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Order</h6>
                                </div> -->
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-sm-3 mb-3 mb-sm-0">Product Name.
                                            <input name="product_name"type="text" required class="form-control form-control-user" id="exampleFirstName"
                                                placeholder="Product Name">
                                        </div>
                                        <div class="col-sm-3">HSN Code
                                            <input name="hsn_code"type="text" class="form-control form-control-user" id="exampleLastName"
                                                placeholder="HSN Code">
                                        </div>
                                        <div class="col-sm-3">Rate
                                            <input name="rate"type="text" required class="form-control form-control-user" id="exampleLastName"
                                                placeholder="Rate">
                                        </div>
                                        <div class="col-sm-3">Quantity
                                            <input name="quantity"type="text" required class="form-control form-control-user" id="exampleLastName"
                                                placeholder="Quantity">
                                        </div>
                                     
                                        
                                    </div>
                                    <div id="new">
                                    <input type="hidden" class="form-control" name="add" id="add" value="add">
                                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="">Save</button>
                               
                                </div></div>
                                    
                                </div>
                            </div>
                        </div>
            </form>
                    <!-- Page Heading -->
                    <?php
include('connection.php');
// $get=$_GET['cat'];
// echo $get;
$sql="SELECT * FROM `item`";
// echo $sql;
?>
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <a href="ordering.php" class="btn btn-primary btn-icon-split">
                                        <!-- <span class="icon text-white-50">
                                            <i class="fas fa-flag"></i> -->
                                        </span>
                                        <!-- <span class="text">Add order</span> -->
                                    </a>
                            <!-- <h6 class="m-0 font-weight-bold text-primary">Order details</h6> -->
                            <!-- <a href="#" class="btn btn-primary btn-icon-split"> -->
                                        <!-- <span class="icon text-white-50">
                                            <i class="fas fa-flag"></i> -->
                                        </span>
                                        <!-- <span class="text"><?php echo $get?></span> -->
                                    </a>
                        </div>
<?php
$res=$connect->query($sql);
if($res->num_rows>0)
{
    $data=$res->fetch_all(MYSQLI_ASSOC);
}
// echo json_encode($data);
?>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" data-page-length='25'  id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        
                                            
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>State</th>
                                            <th>GSTIN</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                       
                                        <tr>
                                         <th>Name</th>
                                            <th>Address</th>
                                            <th>State</th>
                                            <th>GSTIN</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr> <?php
                                        foreach($res as $data)
                                        {?>
                                            <td><?php echo $data['product_name']; ?></td>
                                            <td><?php echo $data['hsn_code'];?></td>
                                            <td> <?php echo $data['rate']; ?></td> 
                                            <td> <?php echo $data['quantity']; ?></td> 
                                            <td> 
                                            <div class="btn-group">    
                                            <button onclick="location.href='edit_item.php?cat=<?php echo $data['id']?>'"type="button"class="btn btn-primary">
                                            <i class="fa fa-edit"></i>     
                                            Edit</button>
                                            <button onclick="if(confirm('Are you sure you want to delete this item?')) { location.href='delete_item.php?id=<?php echo $data['id']?>'; }" type="button" class="btn btn-primary">
    <i class="fa fa-trash"></i> Delete
</button>


                                           
                                            </td></div>
                                        </tr><?php
                                        }
                                        ?>
                                        
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
        include('footer.php');
        ?>
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