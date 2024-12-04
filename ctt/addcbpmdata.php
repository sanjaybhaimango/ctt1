<?php

include('session.php');
include('usernav.php');
$error="";
$sid=$row['ship_id'];
$ses_sql1 = mysqli_query($db,"select * from ships where ship_id = '$sid' ");
   
$row1 = mysqli_fetch_array($ses_sql1,MYSQLI_ASSOC);
?>




<main class="main users chart-page" id="skip-target">
    <div class="container">
    <!--<h2 class="main-title"><?php echo $row1['ship_name'] ?> (<?php echo $row['name'] ?>) - Add New CBPM Data</h2>-->
        <div class="row">        
            <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
            <form class="form col-sm-12" action="addnewcbpmdata.php" method="get" enctype="multipart/form-data">
                <table style="width:100%">
                    <tr>
                        <td>
                            <div class="col-sm-3">
                                <label>Year</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-3">
                                <select class="form-input" name="year" id="year" required>
                                    <option value="">--Select--</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-3">
                                <label>Month</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-3">
                                <select class="form-input" name="month" id="month" required>
                                    <option value="">--Select--</option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" value="<?php echo $row1['ship_id'] ?>" name="shipid">
                            <input class="form-btn primary-default-btn transparent-btn" type="submit" value="Next" name="submit">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    
    </div>
</main>


<?php
  include('masterfooter.php')
?>