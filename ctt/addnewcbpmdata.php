<?php

include('session.php');
$error="";
$sid=$row['ship_id'];
$ses_sql1 = mysqli_query($db,"select * from ships where ship_id = '$sid' ");
   
$row1 = mysqli_fetch_array($ses_sql1,MYSQLI_ASSOC);

$year=$_GET['year'];
$month=$_GET['month'];
include('usernav.php');

$sqlvcc = mysqli_query($db,"select sum(isval) as isval from cbpm where ship_id = '$sid' and year = '$year' and month='$month' ");   
$rowvcc = mysqli_fetch_array($sqlvcc,MYSQLI_ASSOC);
if($rowvcc['isval'] >0)
            {
            echo '<script>alert("Data already Validated, No changes can be made after Validation");</script>';
            }



?>




<main class="main users chart-page" id="skip-target">
    <div class="container">
    <div class="row">        
            <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
            <form class="form col-sm-12" action="" method="post" enctype="multipart/form-data">
                <table style="width:100%">
                    <tr>
                        <td>
                            <div class="col-sm-3">
                                <label>Year</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-3">
                            <input type="text" value="<?php echo $year ?>" name="year" disabled>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-3">
                                <label>Month</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-3">
                            <input type="text" value="<?php echo $month ?>" name="month" disabled>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="col-sm-5">
                                <label>Equipment</label>
                            </div>
                        </td>
                        <td colspan="3">
                            <div class="col-sm-7">
                                <select class="form-input" name="eqpt" required>
                                    <?php
                                        $sqlp = mysqli_query($db,"select * from equipment where eqpt_id in (select eqpt_id from semap, ships where ships.ship_id = '$sid' and semap.sclass_id=ships.sclass_id)");   
                                        if($sqlp) 
                                        {
                                            $i = 1;
                                            while($eqptn = mysqli_fetch_assoc($sqlp))
                                            {
                                    ?>
                                        <option value="<?php echo $eqptn['eqpt_id'];?>"><?php echo $eqptn['eqpt_name'];?></option>
                                    <?php
                                            $i++;
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" value="<?php echo $row1['ship_id'] ?>" name="shipid">


                            <?php
                            if($rowvcc['isval'] >0)
                            {?>
                                <input class="form-btn primary-default-btn transparent-btn" type="submit" value="Next" disabled>
                                <?php
                            }
                            else{

                            
                            ?>
                            <input class="form-btn primary-default-btn transparent-btn" type="submit" value="Next" name="submit1">
                                <?php
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    <?php
    if(isset($_POST["submit1"]))
    {    
        $shipid=$_POST['shipid'];
        //$year=$_POST['year'];
        //$month=$_POST['month'];
        $eqpt=$_POST['eqpt'];
        $sql1 = "select * from cbpm where ship_id = '$shipid' and month = '$month' and year = '$year' and eqpt_id = '$eqpt'";  
        $result = mysqli_query($db, $sql1);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1)
        {  
            $svpt1 = $row['vpt1'];
            $svpt2=$row['vpt2'];
        $svpt3=$row['vpt3'];
        $svpt4=$row['vpt4'];
        $svpt5=$row['vpt5'];
        $svpt6=$row['vpt6'];
        $svpt7=$row['vpt7'];
        $svpt8=$row['vpt8'];
        $svpt9=$row['vpt9'];
        $svpt10=$row['vpt10'];
        $svpt11=$row['vpt11'];
        $svpt12=$row['vpt12'];
        $svpt13=$row['vpt13'];
        $svpt14=$row['vpt14'];

        $smt1=$row['mt1'];
        $smb1=$row['mb1'];

        $smt2=$row['mt2'];
        $smb2=$row['mb2'];
        
        $smt3=$row['mt3'];
        $smb3=$row['mb3'];
        
        $smt4=$row['mt4'];
        $smb4=$row['mb4'];
        
        $smt5=$row['mt5'];
        $smb5=$row['mb5'];
        
        $smt6=$row['mt6'];
        $smb6=$row['mb6'];
        
        $smt7=$row['mt7'];
        $smb7=$row['mb7'];
        
        $smt8=$row['mt8'];
        $smb8=$row['mb8'];

        $smdbm=$row['mdbm'];
        $smdbc=$row['mdbc'];
        $smdbi=$row['mdbi'];
        $smdbcol=$row['mdbcol'];

        $smndbm=$row['mndbm'];
        $smndbc=$row['mndbc'];
        $smndbi=$row['mndbi'];
        $smndbcol=$row['mndbcol'];
        
        $sinsulation=$row['insulation'];
        $ssc=$row['sc'];
        $src=$row['rc'];
        $srh=$row['rh'];
        $srpm=$row['rpm'];
        $sremark=$row['remark'];
        $sddate = $row['ddate'];
        }  
        else
        {
            $count = 0;
            $svpt1="";
            $svpt2="";
        $svpt3="";
        $svpt4="";
        $svpt5="";
        $svpt6="";
        $svpt7="";
        $svpt8="";
        $svpt9="";
        $svpt10="";
        $svpt11="";
        $svpt12="";
        $svpt13="";
        $svpt14="";

        $smt1="";
        $smb1="";

        $smt2="";
        $smb2="";
        
        $smt3="";
        $smb3="";
        
        $smt4="";
        $smb4="";
        
        $smt5="";
        $smb5="";
        
        $smt6="";
        $smb6="";
        
        $smt7="";
        $smb7="";
        
        $smt8="";
        $smb8="";

        $smdbm="";
        $smdbc="";
        $smdbi="";
        $smdbcol="";

        $smndbm="";
        $smndbc="";
        $smndbi="";
        $smndbcol="";
        
        $sinsulation="";
        $ssc="";
        $src="";
        $srh="";
        $srpm="";
        $sremark="";
        $sddate ="";
        }
        ?>
        <br/>

        <div class="row">        
            <form class="form col-sm-12" action="" method="post" enctype="multipart/form-data">
                
            <center><h3>Vibration Reading</h3></center>
            <br/>
                <table style="width:100%">                    
                    <tr>
                        <td>
                            <div class="col-sm-1">
                                <label>PT1</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="pt1" name="pt1" value="<?php echo $svpt1; ?>"/>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <label>PT2</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="pt2" name="pt2" value="<?php echo $svpt2; ?>"/>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <label>PT3</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="pt3" name="pt3" value="<?php echo $svpt3; ?>"/>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="col-sm-1">
                                <label>PT4</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="pt4" name="pt4" value="<?php echo $svpt4; ?>"/>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <label>PT5</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="pt5" name="pt5" value="<?php echo $svpt5; ?>"/>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <label>PT6</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="pt6" name="pt6" value="<?php echo $svpt6; ?>"/>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="col-sm-1">
                                <label>PT7</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="pt7" name="pt7" value="<?php echo $svpt7; ?>"/>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <label>PT8</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="pt8" name="pt8" value="<?php echo $svpt8; ?>"/>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <label>PT9</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="pt9" name="pt9" value="<?php echo $svpt9; ?>"/>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="col-sm-1">
                                <label>PT10</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="pt10" name="pt10" value="<?php echo $svpt10; ?>"/>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <label>PT11</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="pt11" name="pt11" value="<?php echo $svpt11; ?>"/>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <label>PT12</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="pt12" name="pt12" value="<?php echo $svpt12; ?>"/>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="col-sm-1">
                                <label>PT13</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="pt13" name="pt13" value="<?php echo $svpt13; ?>"/>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <label>PT14</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="pt14" name="pt14" value="<?php echo $svpt14; ?>"/>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6"><br/><center><h3>Mount Attenuation</h3></center><br/></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="col-sm-3">
                                <label><h4>Mount 1</h4></label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <label>Top</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="mt1" name="mt1" value="<?php echo $smt1; ?>"/>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <label>Bottom</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="mb1" name="mb1" value="<?php echo $smb1; ?>"/>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="col-sm-3">
                                <label><h4>Mount 2</h4></label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <label>Top</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="mt2" name="mt2" value="<?php echo $smt2; ?>"/>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <label>Bottom</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="mb2" name="mb2" value="<?php echo $smb2; ?>"/>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="col-sm-3">
                                <label><h4>Mount 3</h4></label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <label>Top</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="mt3" name="mt3" value="<?php echo $smt3; ?>"/>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <label>Bottom</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="mb3" name="mb3" value="<?php echo $smb3; ?>"/>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="col-sm-3">
                                <label><h4>Mount 4</h4></label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <label>Top</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="mt4" name="mt4" value="<?php echo $smt4; ?>"/>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <label>Bottom</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="mb4" name="mb4" value="<?php echo $smb4; ?>"/>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="col-sm-3">
                                <label><h4>Mount 5</h4></label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <label>Top</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="mt5" name="mt5" value="<?php echo $smt5; ?>"/>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <label>Bottom</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="mb5" name="mb5" value="<?php echo $smb5; ?>"/>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="col-sm-3">
                                <label><h4>Mount 6</h4></label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <label>Top</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="mt6" name="mt6" value="<?php echo $smt6; ?>"/>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <label>Bottom</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="mb6" name="mb6" value="<?php echo $smb6; ?>"/>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="col-sm-3">
                                <label><h4>Mount 7</h4></label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <label>Top</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="mt7" name="mt7" value="<?php echo $smt7; ?>"/>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <label>Bottom</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="mb7" name="mb7" value="<?php echo $smb7; ?>"/>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="col-sm-3">
                                <label><h4>Mount 8</h4></label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <label>Top</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="mt8" name="mt8" value="<?php echo $smt8; ?>"/>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <label>Bottom</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="mb8" name="mb8" value="<?php echo $smb8; ?>"/>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6"><br/><center><h3>Motor/ Alternator Drive End</h3></center><br/></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="col-sm-1">
                                <label>dBm</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="mdbm" name="mdbm" value="<?php echo $smdbm; ?>"/>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <label>dBc</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="mdbc" name="mdbc" value="<?php echo $smdbc; ?>"/>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <label>dBi</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="mdbi" name="mdbi" value="<?php echo $smdbi; ?>"/>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="col-sm-1">
                                <label>Colour</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="mdbcol" name="mdbcol" value="<?php echo $smdbcol; ?>"/>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6"><br/><center><h3>Motor/ Alternator Non Drive End</h3></center><br/></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="col-sm-1">
                                <label>dBm</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="mndbm" name="mndbm" value="<?php echo $smndbm; ?>"/>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <label>dBc</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="mndbc" name="mndbc" value="<?php echo $smndbc; ?>"/>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <label>dBi</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="mndbi" name="mndbi" value="<?php echo $smndbi; ?>"/>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="col-sm-1">
                                <label>Colour</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="mndbcol" name="mndbcol" value="<?php echo $smndbcol; ?>"/>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6"><br/><center><h3>Other Data</h3></center><br/></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="col-sm-1">
                                <label>Insulation</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="insulation" name="insulation" value="<?php echo $sinsulation; ?>"/>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <label>Starting Current</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="sc" name="sc" value="<?php echo $ssc; ?>"/>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <label>Running Current</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="rc" name="rc" value="<?php echo $src; ?>"/>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="col-sm-1">
                                <label>Running Hour</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="rh" name="rh" value="<?php echo $srh; ?>"/>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <label>RPM/Load</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <input class="form-input" type="text" id="rpm" name="rpm" value="<?php echo $srpm; ?>"/>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <label>Remark</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-1">
                                <textarea class="form-input" type="text" id="remark" name="remark"><?php echo $sremark; ?></textarea>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            
                        <input type="hidden" value="<?php echo $shipid ?>" name="shipids">
                        <input type="hidden" value="<?php echo $year ?>" name="year">
                        <input type="hidden" value="<?php echo $month ?>" name="month">
                        <input type="hidden" value="<?php echo $eqpt ?>" name="eqpt">
                            <br/>
                            <center>
                            <input class="form-btn primary-default-btn transparent-btn" type="submit" value="Add" name="adddata">
                            </center>
                            <br/>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    <?php
    } 

    if(isset($_POST["adddata"]))
    {    
        $shipid=$_POST['shipids'];
        $year=$_POST['year'];
        $month=$_POST['month'];
        $eqpt=$_POST['eqpt'];
        $vpt1=$_POST['pt1'];
        $vpt2=$_POST['pt2'];
        $vpt3=$_POST['pt3'];
        $vpt4=$_POST['pt4'];
        $vpt5=$_POST['pt5'];
        $vpt6=$_POST['pt6'];
        $vpt7=$_POST['pt7'];
        $vpt8=$_POST['pt8'];
        $vpt9=$_POST['pt9'];
        $vpt10=$_POST['pt10'];
        $vpt11=$_POST['pt11'];
        $vpt12=$_POST['pt12'];
        $vpt13=$_POST['pt13'];
        $vpt14=$_POST['pt14'];

        $mt1=$_POST['mt1'];
        $mb1=$_POST['mb1'];

        $mt2=$_POST['mt2'];
        $mb2=$_POST['mb2'];
        
        $mt3=$_POST['mt3'];
        $mb3=$_POST['mb3'];
        
        $mt4=$_POST['mt4'];
        $mb4=$_POST['mb4'];
        
        $mt5=$_POST['mt5'];
        $mb5=$_POST['mb5'];
        
        $mt6=$_POST['mt6'];
        $mb6=$_POST['mb6'];
        
        $mt7=$_POST['mt7'];
        $mb7=$_POST['mb7'];
        
        $mt8=$_POST['mt8'];
        $mb8=$_POST['mb8'];

        $mdbm=$_POST['mdbm'];
        $mdbc=$_POST['mdbc'];
        $mdbi=$_POST['mdbi'];
        $mdbcol=$_POST['mdbcol'];

        $mndbm=$_POST['mndbm'];
        $mndbc=$_POST['mndbc'];
        $mndbi=$_POST['mndbi'];
        $mndbcol=$_POST['mndbcol'];
        
        $insulation=$_POST['insulation'];
        $sc=$_POST['sc'];
        $rc=$_POST['rc'];
        $rh=$_POST['rh'];
        $rpm=$_POST['rpm'];
        $remark=$_POST['remark'];
        $ddate=$_POST['ddate'];
        
        $sql1 = "select * from cbpm where ship_id = '$shipid' and month = '$month' and year = '$year' and eqpt_id = '$eqpt'";  
        $result = mysqli_query($db, $sql1);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
        $cbpm_id = $row['cbpm_id'];
        $count = mysqli_num_rows($result);  
          $sql="";
        if($count == 1)
        {  
            $sql = "update cbpm set `ddate` = '$ddate', `vpt1`='$vpt1', `vpt2`='$vpt2', `vpt3`='$vpt3', `vpt4`='$vpt4', `vpt5`='$vpt5', `vpt6`='$vpt6', `vpt7`='$vpt7', `vpt8`='$vpt8', `vpt9`='$vpt9', `vpt10`='$vpt10', `vpt11`='$vpt11', `vpt12`='$vpt12', `vpt13`='$vpt13', `vpt14`='$vpt14', `mt1`='$mt1', `mb1`='$mb1', `mt2`='$mt2', `mb2`='$mb2', `mt3`='$mt3', `mb3`='$mb3', `mt4`='$mt4', `mb4`='$mb4', `mt5`='$mt5', `mb5`='$mb5', `mt6`='$mt6', `mb6`='$mb6', `mt7`='$mt7', `mb7`='$mb7', `mt8`='$mt8', `mb8`='$mb8', `mdbm`='$mdbm', `mdbc`='$mdbc', `mdbi`='$mdbi', `mdbcol`='$mdbcol', `mndbm`='$mndbm', `mndbc`='$mndbc', `mndbi`='$mndbi', `mndbcol`='$mndbcol', `insulation`='$insulation', `sc`='$sc', `rc`='$rc', `rh`='$rh', `rpm`='$rpm', `remark`='$remark' where cbpm_id = '$cbpm_id'";
        }  
        else
        {
        $sql = "insert into cbpm (`ddate`, `ship_id`, `month`, `year`, `eqpt_id`, `vpt1`, `vpt2`, `vpt3`, `vpt4`, `vpt5`, `vpt6`, `vpt7`, `vpt8`, `vpt9`, `vpt10`, `vpt11`, `vpt12`, `vpt13`, `vpt14`, `mt1`, `mb1`, `mt2`, `mb2`, `mt3`, `mb3`, `mt4`, `mb4`, `mt5`, `mb5`, `mt6`, `mb6`, `mt7`, `mb7`, `mt8`, `mb8`, `mdbm`, `mdbc`, `mdbi`, `mdbcol`, `mndbm`, `mndbc`, `mndbi`, `mndbcol`, `insulation`, `sc`, `rc`, `rh`, `rpm`, `remark`) values ('$ddate','$shipid','$month','$year','$eqpt','$vpt1','$vpt2','$vpt3','$vpt4','$vpt5','$vpt6','$vpt7','$vpt8','$vpt9','$vpt10','$vpt11','$vpt12','$vpt13','$vpt14','$mt1','$mb1','$mt2','$mb2','$mt3','$mb3','$mt4','$mb4','$mt5','$mb5','$mt6','$mb6','$mt7','$mb7','$mt8','$mb8','$mdbm','$mdbc','$mdbi','$mdbcol','$mndbm','$mndbc','$mndbi','$mndbcol','$insulation','$sc','$rc','$rh','$rpm','$remark')";
        }
        if ($db->query($sql) === TRUE) 
        {
            echo '<script>alert("Data Saved Successfully");</script>';
        } 
        else 
        {
        echo "Error Saving Data: " . $db->error;
        }


    }
    ?>
    
    </div>
</main>


<?php
  include('masterfooter.php')
?>