<?php
   include('conn.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select * from user where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   $roleid = $row['role'];
   $shipid=$row['ship_id'];
   $uname=$row['name'];
   

   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
      die();
   }
?>