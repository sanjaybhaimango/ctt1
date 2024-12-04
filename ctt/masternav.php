<?php
if($roleid == "2" || $roleid == "3")
{
  header("location:user_dashboard.php");
}
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
  <script src="Assets/js/chart.js"></script> <!-- Adjust the path to your Chart.js file -->
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
                <li>
                    <a href="e_cbpm_report.php"><span class="icon category" aria-hidden="true"></span>e-CBPM Data</a>
                </li>
                <li>
                    <a href="e_cbpm_trend.php"><span class="icon paper" aria-hidden="true"></span>e-CBPM Reports</a>
                </li>
                <li>
                    <a href="admin_upload.php"><span class="icon paper" aria-hidden="true"></span>Upload e-CBPM</a>
                </li>
            </ul>
            <?php
                if($roleid == "1")
                {
            ?>
            <span class="system-menu__title">admin manager</span>
            <ul class="sidebar-body-menu">
                <li>
                    <a href="ship_types.php"><span class="icon arrows-up-down" aria-hidden="true"></span>Ship Class</a>
                </li>
                <li>
                    <a href="ships.php"><span class="icon radio" aria-hidden="true"></span>Ships</a>
                </li>
                <li>
                    <a href="eqpt.php"><span class="icon setting" aria-hidden="true"></span>Equipments</a>
                </li>
                <li>
                    <a href="map_e_sc.php"><span class="icon settings-line" aria-hidden="true"></span>Map Equipments</a>
                </li>
                <li>
                    <a href=""><span class="icon user-3" aria-hidden="true"></span>Add User</a>
                </li>
            </ul>
            <span class="system-menu__title">content manager</span>
            <ul class="sidebar-body-menu">
                <li>
                    <a href="master_org_chart.php"><span class="icon time-circle" aria-hidden="true"></span>Organisation Chart</a>
                </li>
                <li>
                    <a href="policy_manager.php"><span class="icon document" aria-hidden="true"></span>Policy Manager</a>
                </li>
                <li>
                    <a href="performa_manager.php"><span class="icon folder" aria-hidden="true"></span>Performa Manager</a>
                </li>
                <li>
                    <a href="trial_manager.php"><span class="icon folder" aria-hidden="true"></span>Trial Manager</a>
                </li>
                <li>
                    <a href="updates_manager.php"><span class="icon folder" aria-hidden="true"></span>Publications Manager</a>
                </li>
                <li>
                    <a href="home_slider.php"><span class="icon image" aria-hidden="true"></span>Home Page Slider</a>
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
            <?php
                }
                ?>
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
    <h2 style="color:white;"><?php echo $uname ?></h2>
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