<?php
session_start();
//coded copyright free
    include 'connection.php';
    $username=$_POST['username'];
    $password=$_POST['password'];
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
        if(password_verify($password,$row['password']))
        {
        $_SESSION["username"]=$username;
           // $log['user_id'] = $row['id'];
            //$log['action_made'] = "Logged in the system.";
           // echo  json_encode($log);
            // save_log($username,"Logged in the system.");
            header('location:index.php?cat=NA');
        }
        else
        {
            // save_log($username,"Invalid Password.");
            header('location:login.php');
        }
         
       }
         } }
    else
    {
        // save_log($username,"In valid Password.");
        header('location:login.php');
    }

    // function save_log($user_id,$action_made){

    //         include 'connection.php';   
        
    //         $sql1 = "INSERT INTO `audit_logs` (`user_id`,`action_made`) VALUES ('$user_id','$action_made')";
    //         $res=mysqli_query($connect,$sql1);
    //     return true;
    // }
    
?>