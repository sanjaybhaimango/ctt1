<?php
include('session.php');
include('masternav.php');
$error="";
?>


<main class="main users chart-page" id="skip-target">
    <div class="container">
    <h2 class="main-title" style="color:white">CBPM Data</h2>
        <div class="row">        
            <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
            <form class="form col-sm-12" action="admin_cbpm_view.php" method="get" enctype="multipart/form-data">
                <table style="width:100%">
                    <tr>
                        <td>
                            <div class="col-sm-3">
                                <label>Ship</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-3">                                
                                <select class="form-input" name="shipid" id="shipid" required>
                                    <option value="">--Select--</option>
                                    <?php
                                    $sqlp = mysqli_query($db,"select * from ships order by ship_name");   
                                        if($sqlp) 
                                        {
                                            $i = 1;
                                            while($eqptn = mysqli_fetch_assoc($sqlp))
                                            {
                                    ?>
                                        <option value="<?php echo $eqptn['ship_id'];?>"><?php echo $eqptn['ship_name'];?></option>
                                    <?php
                                            $i++;
                                            }
                                        }
                                        ?>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-3">
                                <label>Year</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-3">
                                <select class="form-input" name="year" id="year" required>
                                    <option value="">--Select--</option>
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
                        <td colspan="8">
                            <input class="form-btn primary-default-btn transparent-btn" type="submit" value="Next" name="submit">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    
    </div>
</main>

<?php
  include('masterfooter.php');
?>