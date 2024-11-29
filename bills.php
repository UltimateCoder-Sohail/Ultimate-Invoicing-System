
<!DOCTYPE html>
<html lang="en">
<?php
include('header.php');
//include 'connection.php';

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


                <!-- Begin Page Content -->
            <form action="sampledata.php" method="post">
                <div class="container-fluid">
                    
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Sampling/Costing for Leather</h1>
                    
                    
            </form>
                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-2 text-gray-800">Sampling table</h1> -->
                    <!--  ADD ROW DYNAMICALLY -->
<form class="form-horizontal" name="insertstore" method="post"  enctype="multipart/form-data">
										<!-- <?php //echo $msg; ?> -->
									
											<div class="form-group row">
												<table id="employee_table" class="table table-bordered dataTable align=center">
                                                    <tr >
                                                        <th class="border-bottom-primary"> Material</th>
                                                        <th class="border-bottom-primary"> Part description</th>
                                                        <th class="border-bottom-primary">DIM1</th>
                                                        <th class="border-bottom-primary"> DIM2 </th> 
                                                        <th class="border-bottom-primary"> PCS </th> 
                                                        <th rowspan="1" > Remove</th> 
                                                    </tr>
                                                    <tr id="row1" class="border-bottom-primary">
                                                      <td>
                                                      <input type="text" class="form-control" name="partdescription[]" placeholder=' Part description'>
                                                      </td>  
                                                        <td>
                                                            <input type="text" class="form-control" name="partdescription[]" placeholder=' Part description'/>
                                                        </td>
                                                        <!-- <td><input type="number" name="production[]"class="form-control" placeholder="Add Total Production"> </td> -->
                                                        <td><input type='number' class='form-control' name='dim1[]' placeholder=' DIM1' step=".01" required/></td>
                                                        <td><input type='number' class='form-control' name='dim2[]' placeholder=' DIM2' step=".01" required/></td>
                                                        <td><input type='number' class='form-control' name='pcs[]' placeholder=' PCS' required></td>
                                               
                                                    </tr>
											    </table>
											</div>
											<div class="form-group row">                                          
                                                    <label class="col-sm-5 col-form-label" for="inputLastName"></label>
                                                     <div class="col-sm-6">
													 <input class="btn btn-warning" type="button" onclick="add_row();" value="Add New Row">
													<button type="submit" name="submit" class="btn btn-primary">Final Save</button></div>                                       
                                            </div>
                                         </form>
                                         <?php 
if(isset($_POST['submit']))
{    
    $itemCount = count($_POST["partdescription"]);
    $itemValues = 0;
	//$query = "INSERT INTO mis_production (fin_year,	production,remarks) VALUES ";
    $query="INSERT INTO `sampling_item`(`stylename`, `partdescription`, `material`, `material_type`, `dim1`, `dim2`, `pcs`, `rate`, `total`) VALUES";
    // ('$stylename_item', '$partdescription', '$dim1', '$dim2','$pcs','$rate','$total')";
		$queryValue = "";
		for($i=0;$i<$itemCount;$i++) {
            $queryTotal=mysqli_query($connect,"SELECT total FROM material_details WHERE material_type = 'LEATHER' AND material = '" . $_POST["material"][$i] . "'");
              // echo " SELECT total FROM material_details WHERE material_type = 'LEATHER' AND material = '" . $_POST["material"][$i] . "'"; 
               while($rowTotal=mysqli_fetch_array($queryTotal))
                {
                    $output= $rowTotal[0] ;
               }
            $total =  ($_POST["pcs"][$i] * $_POST["dim1"][$i] * $_POST["dim2"][$i]) /$output;
			if(!empty($_POST["partdescription"][$i]) || !empty($_POST["dim1"][$i])) {
				$itemValues++;
				if($queryValue!="") {
					$queryValue .= ",";
				}
				$queryValue .= "('" . $_POST["stylename_item"][$i] . "','" . $_POST["partdescription"][$i] . "','" . $_POST["material"][$i] . "','LEATHER', '" . $_POST["dim1"][$i] . "', '" . $_POST["dim2"][$i] . "','"
                 . $_POST["pcs"][$i] . "','0','$total')";
			}
		}
		$sql = $query.$queryValue;
		//echo 'IMSERT INTO' .$sql;
		if($itemValues!=0) {
		    $result = mysqli_query($connect, $sql);
			save_log($_SESSION["username"],"Costing  of".$_POST["stylename_item"][0]);
			if(!empty($result)) $message = "Added Successfully.";
			$msg="<div class='alert alert-success '><strong>Welcome!".$sql."</strong>
             Added Successfully<button type='button' class='close' data-dismiss='alert'>×</button> </div>";
             

		}
	
	}
?>

<!--  end ADD ROW DYNAMICALLY -->

                    <!-- DataTales Example -->
                    <?php
include('connection.php');
$get=$_GET['cat'];
// echo $get;
$sql="SELECT * FROM `sampling_item` WHERE material_type IN ('LEATHER') AND stylename='$get'";
// echo $sql;
?>
<div class="card shadow mb-4">
                        <!-- <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Item details</h6>
                            <a href="#" class="btn btn-primary btn-icon-split">
                                         <span class="icon text-white-50">
                                            <i class="fas fa-flag"></i> 
                                        </span>
                                        <span class="text"><?php //echo $get?></span>
                                    </a>
                        </div> -->
<?php
// $res=$connect->query($sql);
// if($res->num_rows>0)
// {
//     $data=$res->fetch_all(MYSQLI_ASSOC);
// }
// echo json_encode($data);
?>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Part description</th>
                                            <th>Dim 1</th>
                                            <th>Dim 2</th>
                                            <th>Pcs</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <tr> <?php   
                                        $total = 0;
                                        foreach($res as $data)
                                        {?>
                                            <td><?php echo $data['partdescription']?></td>
                                            <td><?php echo $data['dim1']?></td>
                                            <td><?php echo $data['dim2']?></td>
                                            <td><?php echo $data['pcs']?></td>
                                            <td><?php echo $data['total']?></td>
                                                 <?php $total+= $data['total']++;?>
                                            <td> 
                                            <div class="btn-group">    
                                            <button onclick="location.href='edit_sampling.php?cat=<?php echo $get?>&id=<?php echo $data['id']?>&page=<?php echo basename($_SERVER['PHP_SELF']);?>'"type="button"class="btn btn-primary">
                                            <i class="fa fa-edit"></i>     
                                            Edit</button>
                                            <a href="delete_sampling.php?cat=<?php echo $get?>&add=d&id=<?php echo $data['id']?>&page=<?php echo basename($_SERVER['PHP_SELF']);?>" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i>Delete</a> 
                                            <!-- <button  onclick="location.href='delete_sampling.php?cat=<?php echo $get?>&add=d&id=<?php echo $data['id']?>'" onclick="return confirm('Are you sure you want to delete?')"s type="button"class="btn btn-primary">
                                                    <i class="fa fa-trash"></i> Delete</button> -->
                                            </td></div<>
                                        </tr><?php
                                        }
                                        ?>
                                        
                                        <tfoot>
                                       
                                       <tr>
                                       <th>Part description</th>
                                           <th>Dim 1</th>
                                           <th>Dim 2</th>
                                           <th>Pcs</th>
                                           <th><?php echo $total ?></th>
                                           <th>Action</th>
                                       </tr>
                                   </tfoot>  
                                    </tbody>
                                </table>
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
                    <a class="btn btn-primary" href="login.php">Logout</a>
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
<script>
// function myFunctionLeather() {
//   var x = document.getElementById("stylename_item").value;
// //   document.getElementById("demo").value= x;
// //alert(window.location="sampling_add_item_leather.php?cat="+x);
// //document.getElementById("stylename_item").value= x;
// document.getElementsByName("stylename_item").value = x ;
// window.location="sampling_add_item_leather.php?cat="+x;
// // alert(x);
 
// }
</script>
<script type="text/javascript">
// Method to create new Row 

// function save_log($user_id,$action_made){

//     include 'connection.php';   

//     $sql1 = "INSERT INTO `audit_logs` (`user_id`,`action_made`) VALUES ('$user_id','$action_made')";
//     $res=mysqli_query($connect,$sql1);
// return true;
// }
</script>
<script>
function add_row()
{
 $rowno=$("#employee_table tr").length;
 $rowno=$rowno+1;
 
 $first="<td>"+$rowno-1+"</td><td>test</td>";
 $second="<td><input type='text' class='form-control' id ='partdescription[]'  name='partdescription[]' placeholder=' Part description'/></td>";
 $fourth="<td><input type='number' class='form-control' name='dim1[]' placeholder=' DIM1' step='.01' required/></td>";
 $fifth="<td><input type='number' class='form-control' name='dim2[]' placeholder=' DIM2' step='.01' required/></td>";
 $sixth="<td><input type='number' class='form-control' name='pcs[]' placeholder=' PCS' required/></td>";
 $seventh="<td><input type='hidden'  name='stylename_item[]' value=<?php echo $_GET['cat']?>></td>"; 
 $("#employee_table tr:last").after("<tr id='row"+$rowno+"' class='border-bottom-primary'>"+$first+""+$second+""+$fourth+""+$fifth+""+$sixth+" "+$seventh+"<td> <a href='#' class='btn btn-danger btn-circle btn-sm' onclick=delete_row('row"+$rowno+"')><i class='fas fa-trash'></i>Remove</a> </td></tr>");
}
function delete_row(rowno)
{
 $('#'+rowno).remove();
}
</script>
<script>
	//Method to show remaning text 
      function countChar(val,$msg,$ct) {
		  $text1=count_message;
        var len = val.value.length;
        if (len >= $ct) {
          val.value = val.value.substring(0, $ct);
        } else {
          $($msg).text($ct - len);
        }
      };
  
</script>

</html>