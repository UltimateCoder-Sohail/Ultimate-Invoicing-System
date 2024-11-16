<?php
session_start();
//coded copyright free
    include 'connection.php';
    $username=$_SESSION['username'];
    $role=1;
    // $pass='$2y$10$roJOpgiJ4/v71UfvXRDCt.m/KDMUXKyJ3PNM5MpfyhY8Rk25qhHK.';
     $sql="select * from login where username='$username' ";
     $res=mysqli_query($connect,$sql);
     $count= mysqli_num_rows($res);
    //  echo $count;
     
    if($count ==1 ){
        while($row=mysqli_fetch_assoc($res)){

      if($row['role']==1)
      {
        
        $_SESSION["username"]=$username;
           // $log['user_id'] = $row['id'];
            //$log['action_made'] = "Logged in the system.";
           // echo  json_encode($log);
            // save_log($username,"Logged out of the system.");
            header('location:login.php');}
        }
        
         session_destroy();
       }
    
   
    // function save_log($user_id,$action_made){

    //         include 'connection.php';   
        
    //         $sql1 = "INSERT INTO `audit_logs` (`user_id`,`action_made`) VALUES ('$user_id','$action_made')";
    //         $res=mysqli_query($connect,$sql1);
    //     return true;
    // }
    
?>