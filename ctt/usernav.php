<?php
if($roleid == "1" || $roleid == "4")
{
  header("location:dashboard.php");
}
$sid=$row['ship_id'];
$ses_sql1 = mysqli_query($db,"select * from ships where ship_id = '$sid' ");
   
$row1 = mysqli_fetch_array($ses_sql1,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CTT | Dashboard</title>
  <!-- Favicon -->
  <link href="Assets/img/ctt-logo.png" rel="icon"/>
  <!-- Custom styles -->
  <link rel="stylesheet" href="./css/style.min.css">
  <style>    
    .row 
            {
                margin-left: 0px !important;
                margin-right: 0 !important;
            }
  </style>
</head>

<body>
  <div class="layer"></div>
<!-- ! Body -->
<a class="skip-link sr-only" href="#skip-target">Skip to content</a>
<div class="page-flex">
  <!-- ! Sidebar -->
  <aside class="sidebar">
    <div class="sidebar-start">
        <div class="sidebar-head">
            <a href="../" class="logo-wrapper" title="Home">
                <span class="sr-only">Home</span>
                <img src="./Assets/img/ctt-logo.png" class="icon logo"/>
                <div class="logo-text">
                    <span class="logo-title">CTT</span>
                    <span class="logo-subtitle">Home</span>
                </div>

            </a>
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle" aria-hidden="true"></span>
            </button>
        </div>
        <div class="sidebar-body">
            <ul class="sidebar-body-menu">
                <li>
                    <a class="active" href="dashboard.php"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
                </li>
            </ul>
            <span class="system-menu__title">returns</span>
            <ul class="sidebar-body-menu">
                <li>
                    <a href="e_cbpm_manager.php"><span class="icon category" aria-hidden="true"></span>e-CBPM Manager</a>
                </li>
                <li>
                    <a href="performa.php"><span class="icon category" aria-hidden="true"></span>Performa</a>
                </li> 
                <li>
                    <a href="trial_report.php"><span class="icon category" aria-hidden="true"></span>Trial Report</a>
                </li>                               
                <!--<li>
                    <a class="show-cat-btn" href="##">
                        <span class="icon user-3" aria-hidden="true"></span>Logout
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="logout.php">Logout</a>
                        </li>
                    </ul>
                </li>-->
            </ul>
        </div>
    </div>
    <div class="sidebar-footer">
        <!--<a href="##" class="sidebar-user">
            <span class="sidebar-user-img">
                <picture><source srcset="./img/avatar/avatar-illustrated-01.webp" type="image/webp"><img src="./img/avatar/avatar-illustrated-01.png" alt="User name"></picture>
            </span>
            <div class="sidebar-user-info">
                <span class="sidebar-user__title"><?php echo $_SESSION['login_user'] ?></span>
            </div>
        </a>-->
    </div>
</aside>
  <div class="main-wrapper" style="background: url('./Assets/img/Background.jpg') no-repeat fixed; background-size: cover; position: sticky;">
    <!-- ! Main nav -->
    <nav>
  <div class="container main-nav">
    <div class="main-nav-start">
    <h2 style="color:white;"><?php echo $uname ?>, <?php echo $row1['ship_name'] ?></h2>
    </div>
    <div class="main-nav-end">
      <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
        <span class="sr-only">Toggle menu</span>
        <span class="icon menu-toggle--gray" aria-hidden="true"></span>
      </button>
      <button class="theme-switcher gray-circle-btn" type="button" title="Switch theme">
        <span class="sr-only">Switch theme</span>
        <i class="sun-icon" data-feather="sun" aria-hidden="true"></i>
        <i class="moon-icon" data-feather="moon" aria-hidden="true"></i>
      </button>
      <div class="nav-user-wrapper">
        <button href="##" class="nav-user-btn dropdown-btn" title="My profile" type="button">
          <span class="sr-only">My profile</span>
          <span class="nav-user-img">
            <picture><source srcset="./img/avatar/avatar-illustrated-02.webp" type="image/webp"><img src="./img/avatar/avatar-illustrated-02.png" alt="User name"></picture>
          </span>
        </button>
        <ul class="users-item-dropdown nav-user-dropdown dropdown">
          <li><a class="danger" href="logout.php">
              <i data-feather="log-out" aria-hidden="true"></i>
              <span>Log out</span>
            </a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>