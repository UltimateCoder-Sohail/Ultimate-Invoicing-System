
<!DOCTYPE html>
<html lang="en">
<?php 
include('header.php');
?>
<style>
    
    #mar{
        background-color:#FCD745;
        color:black;
        font-weight:900;
    }
    #order{
        color:red;
        text-decoration:underline;
    }
    #overlay {
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100%;
background-color: #000;
filter:alpha(opacity=70);
-moz-opacity:0.7;
-khtml-opacity: 0.7;
opacity: 0.7;
z-index: 100;
display: none;
}
.cnt223 a{
text-decoration: none;
}
.popup-onload{
width: 100%;
margin: 0 auto;
display: none;
position: fixed;
z-index: 101;
}
.cnt223{
min-width: 600px;
width: 600px;
min-height: 150px;
margin: 100px auto;
background: #f3f3f3;
position: relative;
z-index: 103;
padding: 15px 35px;
border-radius: 5px;
box-shadow: 0 2px 5px #000;

}
.cnt223 p{
clear: both;
    color: #555555;
    /* text-align: justify; */
    font-size: 20px;
    font-family: sans-serif;
}
.cnt223 p a{
color: #d91900;
font-weight: bold;
}
.cnt223 .x{
float: right;
height: 35px;
left: 22px;
position: relative;
top: -25px;
width: 34px;

}
.cnt223 .x:hover{
cursor: pointer;
}
</style>


<!-- <body id="page-top"> -->

    <!-- Page Wrapper -->
   

        <!-- Content Wrapper -->
        <!-- <div id="content-wrapper" class="d-flex flex-column"> -->

 <!--
    https://opensource.org/license/mit/ code  taken from codepen https://codepen.io/rosybabu8/pen/MEmVVq
 -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <div class='popup-onload'>
<div class='cnt223'>
<?php                          function fetch(){
                                include('connection.php');
                                $sql="SELECT `id`, `orderno`, `description`, `orderdate`, `ddate` FROM `ordering` WHERE 1" ;
                                $res=mysqli_query($connect,$sql);
                                return $res;
                            }   $i=0;
                                $res=fetch();
                               foreach($res as $data)
                                {$i++;
                                    if($i==6){
                                        break;
                                    }
                                    $date1=$data['ddate'];
                                    // echo $date1;
                                    // $date2=$data['orderdate'];
    
                                    // $date1=date_create($data['orderdate']);
                                    date_default_timezone_set('Asia/Kolkata');
                                    // $date3=date('Y-m-d',time());
                                    // echo $date3;
                                   $date1=new DateTime();
                                    $date2=date_create($data['ddate']);
                                    // echo $date2;
                                    $diff=date_diff($date1,$date2);
                                   // $long=($diff->m*30)+$diff->d;
                                   $long=$diff->format("%R%a");
                                    $long=$long+1;
                                    // echo "<br>".$long."<br>";
                                    
                                    //$difference=date_diff($date2,$date1);
                                    //echo $difference->format("%R%a days");
                                if($long<=7) { ?>
                        <a class="dropdown-item d-flex align-items-center" href="recieve_total_report.php?cat=<?php echo $data['orderno'] ?>">
                        <?php } 
                        else {
                        ?>  <a class="dropdown-item d-flex align-items-center" href="issue_total_report.php?cat=<?php echo $data['orderno'] ?>"> <?php } ?>
                        <div class="mr-3">
                                <div class="icon-circle bg-primary">
                                    <i class="fas fa-file-alt text-white"></i>
                                </div>
                            </div>
                           
                            <div>
                                <!-- <div class="small text-gray-500">December 12, 2019</div> -->
                                <span class="font-weight-bold"><?php 
                                if($long<=7){
                                    echo "Days left: "."<b id=order>".$diff->format("%R%a")." days </b>"."<br>";
                                echo "Order No.".$data['orderno']."<br>".""."Delivery date"."<b id=order>". date('d/m/y',strtotime($data['ddate']))."</b>"; } 
                                
                            
                            else {
                                echo "Days left: "."<b>".$diff->format("%R%a")." days </b>"."<br>";
                                echo "Order No.".$data['orderno']."<br>".""."Delivery date".date('d/m/y',strtotime($data['ddate'])); 
                            } 
                            ?></span>
                        </div>
                        </a><?php } ?>
<p>

<br/>
<br/>
<a href='' class='close'>Close</a>
</p>
</div>
</div>

                    <!-- Page Heading -->
                    <div id="mar"><marquee>HURRY UP <?php
                        $res=fetch();
                        foreach($res as $data)
                        {
                            // $date1=$data['ddate'];
                                // echo $date1;
                                $date2=$data['orderdate'];
                                date_default_timezone_set('Asia/Kolkata');
                                // $date3=date('Y-m-d',time());
                                // echo $date3;
                               $date1=new DateTime();
                                // $date1=date_create($data['orderdate']);
                                $date2=date_create($data['ddate']);
                                $diff=date_diff($date1,$date2);
                                $long=($diff->m*30)+$diff->d;
                                $long=$long+1;
                                // echo "<br>".$long."<br>";
                                echo "Days left: "."<b id=order>".$diff->format("%R%a")." days </b>"."for ORDER ".$data['orderno'].", ";
                                //$difference=date_diff($date2,$date1);
                                //echo $difference->format("%R%a days");
                                
                                // echo "Order No.".$data['orderno']."<br>"."Order date:".$data['orderdate']."<br>"."Delivery date"."<b id=order>".$data['ddate']."</b>"; 
                            
                            
                                
                           
                        }
                        ?>
                        </marquee></div>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Earnings (Monthly)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Earnings (Annual)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Order by Color  
                                        <select id="order_item"name="order_item"class="form-control" onchange="myFunctionOrder()">
                                            <option>Select Order No</option>
                                            <?php 
                                             $optionsMaterial='';
                                              $query ="SELECT orderno FROM ordering ORDER BY orderno" ;
                                              $result = $connect->query($query);
                                              if($result->num_rows> 0){
                                                $optionsOrder= mysqli_fetch_all($result, MYSQLI_ASSOC);
                                              } 
                                             foreach ($optionsOrder as $option) {
                                             ?>
                                                 <option><?php echo $option['orderno']; ?> </option>
                                                 <?php 
                                                 }
                                             ?>
                                            <option selected><?php echo $_GET['cat']?></option>
                                            </select>
                                        </h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChartTest"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Direct
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Social
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Referral
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <?php
                        include('connection.php');
                        $orderArr=array();
                        $query ="SELECT DISTINCT orderno FROM ordering_item ORDER BY orderno ASC" ;
                        $result = $connect->query($query);
                        if($result->num_rows> 0){
                          $optionsOrder= mysqli_fetch_all($result, MYSQLI_ASSOC);
                        } 
                        $x=0;
                       foreach ($optionsOrder as $option) {
                       
            
                           $orderArr [$x] = $option['orderno'];
                           $x++;
                           }
                         $arrlength=count($orderArr);
                        //  echo "array length" . $arrlength;
                for ($i=0;$i<$arrlength;$i++)
                {
                         //echo $orderArr [$i];
                        $sqlOrder= "SELECT orderno,SUM(pcs) AS TOTALPCS FROM `ordering_item` 
                        WHERE orderno='$orderArr[$i]' GROUP BY orderno";
                        $sqlIssuing = "SELECT issuing.orderno ,sum(issuing_item.issuepcs) AS total FROM issuing,`issuing_item`
                         WHERE issuing_item.challanno=issuing.challanno AND issuing.orderno ='$orderArr[$i]' GROUP BY issuing.orderno";
                        
                        $sqlRecived = "SELECT SUM(recieving_item.recievedpcs) AS totalrecivepcs FROM issuing,recieving_item WHERE
                         recieving_item.challanno =issuing.challanno AND  issuing.orderno ='$orderArr[$i]' GROUP BY orderno";

                        $sqlChecking = "SELECT SUM(checking_item.accepted) AS totalaccepted FROM issuing,checking_item  WHERE
                        checking_item.challanno =issuing.challanno AND  issuing.orderno ='$orderArr[$i]' GROUP BY orderno";
                       // echo $sqlChecking;

                       $sqlCutting = "SELECT stylename,color,totalpcs,sum(cuttingpcs) AS cuttingpcs FROM cutting_item 
                       WHERE orderno ='$orderArr[$i]' GROUP BY orderno";

                        
                        $res1=mysqli_query($connect,$sqlOrder);
                        if($res1->num_rows> 0)
                        {
                                foreach($res1 as $data1){
                                        $totalordering_item =$data1['TOTALPCS'];
                                        $totalorderno =$data1['orderno'];
                                }
                                  
                            //echo "TOTALPCS JAMIL   "  .$total1[1];
                        }
                        else{
                            $totalordering_item =0;
                        }    
                        
                        $res=mysqli_query($connect,$sqlIssuing);
                        if($res->num_rows> 0)
                        {
                          foreach($res as $data){
                           $totalissuing_item = $data['total'];
                          } 
                                
                        }
                        else
                        $totalissuing_item=0;

                        $resRecived=mysqli_query($connect,$sqlRecived);
                        if($resRecived->num_rows> 0)
                        {
                            foreach($resRecived as $data2)
                            {
                                $totalrecieving_item =$data2['totalrecivepcs'];
                            } 
                        }     
                        else
                        $totalrecieving_item =0;

                        // checking status
                        $resChecking=mysqli_query($connect,$sqlChecking);
                        if($resChecking->num_rows> 0)
                        {
                            foreach($resChecking as $data3)
                            {
                                $totalchecking_item =$data3['totalaccepted'];
                            } 
                        }     
                        else
                        $totalchecking_item =0;
                       // cutting  status
                       $resCutting=mysqli_query($connect,$sqlCutting);
                       if($resCutting->num_rows> 0)
                       {
                           foreach($resCutting as $data4)
                           {
                               $totalcutting_item =$data4['cuttingpcs'];
                           } 
                       }     
                       else
                       $totalcutting_item =0;
                       ?>
                        
                    
                        <!-- Content Column -->
                        

                            
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Order Tracking  <?php echo  $totalorderno; ?></h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">Order Issue status<span
                                            class="float-right"><b id=order><?php 
                                            echo "( ISSUE ITEM  ".$totalissuing_item."  ORDER ITEM ".$totalordering_item.")        ";
                                            $percent=($totalissuing_item/$totalordering_item)*100;
                                            echo round($percent);  ?>%</b></span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo round($percent)."%" ?>"
                                            aria-valuenow="<?php echo round($percent); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Cutting status<span
                                            class="float-right"><b id=order><?php 
                                            echo "( CUTTING ITEM  ".$totalcutting_item."  ORDER ITEM ".$totalordering_item.")        ";
                                            $percent=($totalcutting_item/$totalordering_item)*100;
                                            echo round($percent);  ?>%</b></span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar progress-bar-success" role="progressbar" style="width: <?php echo round($percent)."%" ?>"
                                            aria-valuenow="<?php echo round($percent); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Receiving Status <span
                                            class="float-right"><b id=order><?php 
                                            echo "( RECEIVED ITEM ".$totalrecieving_item." ORDER ITEM ".$totalordering_item.")        ";
                                            $percent=($totalrecieving_item/$totalordering_item)*100;
                                            echo round($percent);
                                            ?>%</b></span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo round($percent)."%" ?>"
                                            aria-valuenow="<?php echo round($percent); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Checking Status <span
                                            class="float-right"><b id=order><?php 
                                            echo "( CECKING ITEM ".$totalchecking_item." ORDER ITEM ".$totalordering_item.")        ";
                                            $percent=($totalchecking_item/$totalordering_item)*100;
                                            echo round($percent);
                                            ?>%</b></span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo round($percent)."%" ?>"
                                            aria-valuenow="<?php echo round($percent); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>

                                    <!-- Checking percentage -->
                                    
                                    <!-- <h4 class="small font-weight-bold">Customer Database <span
                                            class="float-right">60%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: 60%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div> -->
                                    <!-- <h4 class="small font-weight-bold">Payout Details <span
                                            class="float-right">80%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div> -->
                                    <!-- <h4 class="small font-weight-bold">Account Setup <span
                                            class="float-right">Complete!</span></h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div> -->
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                            
                            <!-- Color System -->
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-primary text-white shadow">
                                        <div class="card-body">
                                            Primary
                                            <div class="text-white-50 small">#4e73df</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-success text-white shadow">
                                        <div class="card-body">
                                            Success
                                            <div class="text-white-50 small">#1cc88a</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-info text-white shadow">
                                        <div class="card-body">
                                            Info
                                            <div class="text-white-50 small">#36b9cc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-warning text-white shadow">
                                        <div class="card-body">
                                            Warning
                                            <div class="text-white-50 small">#f6c23e</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-danger text-white shadow">
                                        <div class="card-body">
                                            Danger
                                            <div class="text-white-50 small">#e74a3b</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-secondary text-white shadow">
                                        <div class="card-body">
                                            Secondary
                                            <div class="text-white-50 small">#858796</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-light text-black shadow">
                                        <div class="card-body">
                                            Light
                                            <div class="text-black-50 small">#f8f9fc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-dark text-white shadow">
                                        <div class="card-body">
                                            Dark
                                            <div class="text-white-50 small">#5a5c69</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                            src="img/undraw_posting_photo.svg" alt="...">
                                    </div>
                                    <p>Add some quality, svg illustrations to your project courtesy of <a
                                            target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                                        constantly updated collection of beautiful svg images that you can use
                                        completely free and without attribution!</p>
                                    <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                        unDraw &rarr;</a>
                                </div>
                            </div>

                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                                </div>
                                <div class="card-body">
                                    <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                                        CSS bloat and poor page performance. Custom CSS classes are used to create
                                        custom components and custom utility classes.</p>
                                    <p class="mb-0">Before working with this theme, you should become familiar with the
                                        Bootstrap framework, especially the utility classes.</p>
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
                    <a class="btn btn-primary" href="login.php?a=Logout">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

    <!-- Core plugin JavaScript-->
    <!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

    <!-- Custom scripts for all pages-->
    <!-- <script src="js/sb-admin-2.min.js"></script> -->

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
</body>
<script>
    $(function(){
var overlay = $('<div id="overlay"></div>');
overlay.show();
overlay.appendTo(document.body);
$('.popup-onload').show();
$('.close').click(function(){
$('.popup-onload').hide();
overlay.appendTo(document.body).remove();
return false;
});


 

$('.x').click(function(){
$('.popup').hide();
overlay.appendTo(document.body).remove();
return false;
});
});
</script>

<?php

 function fetchColor(){
    include('connection.php');
    $order_item =$_GET['cat'] ;
    //$sqlColor='';
    if($order_item=='All')
    {
        $sqlColor="SELECT color,sum(PCS) AS Total from ordering_item  group by color ;" ;
       
    }else{
        $sqlColor="SELECT color,sum(PCS) AS Total from ordering_item where orderno='$order_item' group by color ;" ;
    }    
    $resColor=mysqli_query($connect,$sqlColor);
    return $resColor;
}
    $resColor=fetchColor();
    $json='';
    $jsonTotal ='';
    $i=0;
   foreach($resColor as $mydata)
    {
         
        // echo  "data:". [$mydata["Total"]];
        
        $totalArray[$i] = $mydata["Total"];
        $totalColorArray[$i] =  $mydata["color"] ;
        $json = json_encode($totalColorArray); 
        $jsonTotal= json_encode($totalArray); 
  
        //echo("The first month of the year is $totalColorArray[$i].\n");
        $i++;
    }    
?>
<script>
    // Area Chart Example
var ctx = document.getElementById("myAreaChartTest");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    //labels: ["1066 Goat Black", "1066 Goat Jeans", "1066 Goat Navy", "1066 Goat Marron", "1066 Goat Red", "1066 Goat Tobacco"],
    labels: <?php echo($json);  ?>,
    datasets: [{
      label: "PCS",
      lineTension: 0.3,
      backgroundColor: "#4e73df",
      borderColor: "#4e73df",
      pointRadius: 3,
      
     
     
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      //data: [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000],
      data: <?php echo ($jsonTotal) ;?>,
    
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            //return '$' + number_format(value);
            return ' ' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ':' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});
</script>
<script>
  
     function myFunctionOrder() {
       var x = document.getElementById("order_item").value;
     window.location="index.php?cat="+x;
    // alert(x);
     }
</script>   

</html>