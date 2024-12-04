<?php
error_reporting(0);
include('session.php');
include('masternav.php');
$error="";
$fy=$_GET['fy'];
$fm=$_GET['fm'];
$ty=$_GET['ty'];
$tm=$_GET['tm'];
$sid=$_GET['shipid'];
$eqpt_id=$_GET['eqpt_id'];
$baction=$_GET['submit'];


$ses_sql1 = mysqli_query($db,"select * from ships where ship_id = '$sid' ");
   
$row1 = mysqli_fetch_array($ses_sql1,MYSQLI_ASSOC);

$ses_sql6 = mysqli_query($db,"select * from equipment where eqpt_id = '$eqpt_id' ");
   
$row6 = mysqli_fetch_array($ses_sql6,MYSQLI_ASSOC);

                          $sqlvckt = mysqli_query($db,"select `equipment`.`eqpt_id`, `equipment`.`cl`, `equipment`.`fdnl`, `equipment`.`lcul`, `equipment`.`lstl`, `equipment`.`nopvl`, `equipment`.`wjfacl`, `semap`.`sclass_id` from equipment, semap where equipment.eqpt_id = semap.eqpt_id AND equipment.eqpt_id='$eqpt_id'");   
                            $rowvckt = mysqli_fetch_array($sqlvckt,MYSQLI_ASSOC);
                            if($rowvckt['sclass_id'] == 1)
                            {
                                $limitkt = $rowvckt['wjfacl'];
                            }
                            elseif($rowvckt['sclass_id'] == 2)
                            {
                                $limitkt = $rowvckt['lcul'];
                            }
                            elseif($rowvckt['sclass_id'] == 7)
                            {
                                $limitkt = $rowvckt['lstl'];
                            }
                            elseif($rowvckt['sclass_id'] == 8)
                            {
                                $limitkt = $rowvckt['cl'];
                            }
                            elseif($rowvckt['sclass_id'] == 9)
                            {
                                $limitkt = $rowvckt['nopvl'];
                            }
                            elseif($rowvckt['sclass_id'] == 10)
                            {
                                $limitkt = $rowvckt['fdnl'];
                            }
                            

?>

<main class="main users chart-page" id="skip-target">
    <div class="container">
<?php



if($baction=='Graph')
{
  $vm_id=$_GET['vm_id'];  
  ?>
  <label style="color:white;">CBPM Trending of </label><h2 class="main-title" style="color: white;"><?php echo $row1['ship_name'] ?> for <?php echo $row6['eqpt_name'] ?> (<?php echo $vm_id; ?> Max Limit - <?php echo $limitkt; ?>)</h2>
        <div class="row" style="height: 450px; width:100% !important; margin-left:10px; background-color: rgb(0 0 0 / 40%);">        
            <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
            <table border="1" style="border-collapse:collapse;text-align:center; color:#ffffff; width:100%">
                <tr>
<?php



$L=$fm;
$K=12;
$M=1;
for($i = $fy; $i <= $ty; $i++)
{
  for($j = $L; $j <= $K; $j++)
  {

    $sqlvcm = mysqli_query($db,"select month from months where mno='$j'");   
    $rowvcm = mysqli_fetch_array($sqlvcm,MYSQLI_ASSOC);
    $mnth = $rowvcm['month'];
          $sqlvc = mysqli_query($db,"select $vm_id as vm_ids from cbpm where eqpt_id='$eqpt_id' and ship_id = '$sid' and year = '$i' and month='$mnth' and isval=1");   
          $rowvc = mysqli_fetch_array($sqlvc,MYSQLI_ASSOC);
          if($rowvc['vm_ids']==0)
          {
              $hts=0;
          }
          else
          {
            $hts=$rowvc['vm_ids']*10;
          }
          if($rowvc['vm_ids']>$limitkt)
          {
            $colcell='red';
          }
          else
          {
            $colcell='green';
          }
          ?>


            <td valign="bottom"><div style="display: flex;justify-content: center;align-items: flex-end;min-width: 80px !important;background-color:<?php echo $colcell; ?>;height:<?php echo $hts.'px' ?>"><?php echo $rowvc['vm_ids'].'<br>'.$mnth.'<br>'.$i;?></div></td>
            </br>
            <?php



          $M++;

          if($j==12)
          {
            $L=1;
          }
          if($i==$ty && $j==$tm)
          {
            //exit();
            break;
          }

        }
      if($i==$ty)
      {
        $K=$tm;
      }
}
?>
</tr>
</table>

<?php

}
else
{
?>


<style>
    td
    {
        min-width: 100px !important;
    }
    tr
    td:first-child::after,th:first-child::after
    {
        content: "";
        display: inline-block;
        vertical-align: top;
        min-height: 30px;
    }
</style>


    <label style="color:white;">CBPM Analysis of </label><h2 class="main-title" style="color: white;"><?php echo $row1['ship_name'] ?> for <?php echo $row6['eqpt_name'] ?></h2>
        <div class="row" style="overflow-x:auto; height: 450px; width:100% !important; margin-left:10px; background-color: rgb(0 0 0 / 40%);">        
            <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
            <table border="1" style="border-collapse:collapse;text-align:center; color:#ffffff;">
                <tr>
                    <th rowspan="3">Ser.</th>
                    <th rowspan="3">Month/Year</th>
                    <!--<th rowspan="3">Date</th>-->
                    <th rowspan="2" colspan="14">Vibration Readings</th>
                    <th colspan="24">Mount Attenuation</th>
                    <th rowspan="2" colspan="4">Motor/ Alternator Drive End</th>                    
                    <th rowspan="2" colspan="4">Motor/ Alternator Non Drive End</th>
                    <th rowspan="3">Insulation</th>
                    <th rowspan="3">Starting Current</th>
                    <th rowspan="3">Running Current</th>
                    <th rowspan="3">Running Hour</th>
                    <th rowspan="3">RPM/ LOAD</th>
                    <th rowspan="3">Remark</th>
                </tr>
                <tr>
                    <th colspan="3">Mount 1</th>
                    <th colspan="3">Mount 2</th>
                    <th colspan="3">Mount 3</th>
                    <th colspan="3">Mount 4</th>
                    <th colspan="3">Mount 5</th>
                    <th colspan="3">Mount 6</th>
                    <th colspan="3">Mount 7</th>
                    <th colspan="3">Mount 8</th>
                </tr>
                <tr>
                    <th>PT 1</th>
                    <th>PT 2</th>
                    <th>PT 3</th>
                    <th>PT 4</th>
                    <th>PT 5</th>
                    <th>PT 6</th>
                    <th>PT 7</th>
                    <th>PT 8</th>
                    <th>PT 9</th>
                    <th>PT 10</th>
                    <th>PT 11</th>
                    <th>PT 12</th>
                    <th>PT 13</th>
                    <th>PT 14</th>

                    <th>Top</th>
                    <th>Bottom</th>
                    <th>%</th>
                    <th>Top</th>
                    <th>Bottom</th>
                    <th>%</th>
                    <th>Top</th>
                    <th>Bottom</th>
                    <th>%</th>
                    <th>Top</th>
                    <th>Bottom</th>
                    <th>%</th>
                    <th>Top</th>
                    <th>Bottom</th>
                    <th>%</th>
                    <th>Top</th>
                    <th>Bottom</th>
                    <th>%</th>
                    <th>Top</th>
                    <th>Bottom</th>
                    <th>%</th>
                    <th>Top</th>
                    <th>Bottom</th>
                    <th>%</th>

                    <th>dBm</th>
                    <th>dBc</th>
                    <th>dBi</th>
                    <th>Colour</th>                    

                    <th>dBm</th>
                    <th>dBc</th>
                    <th>dBi</th>
                    <th>Colour</th>                    
                </tr>

                <?php
                $L=$fm;
                $K=12;
                $M=1;
                for($i = $fy; $i <= $ty; $i++)
                {
                  for($j = $L; $j <= $K; $j++)
                  {

                    $sqlvcm = mysqli_query($db,"select month from months where mno='$j'");   
                    $rowvcm = mysqli_fetch_array($sqlvcm,MYSQLI_ASSOC);
                    $mnth = $rowvcm['month'];
                          $sqlvc = mysqli_query($db,"select * from cbpm where eqpt_id='$eqpt_id' and ship_id = '$sid' and year = '$i' and month='$mnth' and isval=1");   
                          $rowvc = mysqli_fetch_array($sqlvc,MYSQLI_ASSOC);
                          include('cellcolor.php');
                          //echo "select * from cbpm where eqpt_id='$eqpt_id' and ship_id = '$sid' and year = '$i' and month='$mnth' and isval=1";
                            ?>

                        <tr>
                            <td><?php echo $M; ?></td>
                            <td style="min-width: 230px !important;"><?php echo $rowvcm['month']; ?> / <?php echo $i; ?></td>
                            <!--<td><?php echo $rowvc['ddate']; ?></td>-->
                            <td style="background-color: <?php echo $vpt1c;?>;"><?php echo $rowvc['vpt1']; ?></td>
                            <td style="background-color: <?php echo $vpt2c;?>;"><?php echo $rowvc['vpt2']; ?></td>
                            <td style="background-color: <?php echo $vpt3c;?>;"><?php echo $rowvc['vpt3']; ?></td>
                            <td style="background-color: <?php echo $vpt4c;?>;"><?php echo $rowvc['vpt4']; ?></td>
                            <td style="background-color: <?php echo $vpt5c;?>;"><?php echo $rowvc['vpt5']; ?></td>
                            <td style="background-color: <?php echo $vpt6c;?>;"><?php echo $rowvc['vpt6']; ?></td>
                            <td style="background-color: <?php echo $vpt7c;?>;"><?php echo $rowvc['vpt7']; ?></td>
                            <td style="background-color: <?php echo $vpt8c;?>;"><?php echo $rowvc['vpt8']; ?></td>
                            <td style="background-color: <?php echo $vpt9c;?>;"><?php echo $rowvc['vpt9']; ?></td>
                            <td style="background-color: <?php echo $vpt10c;?>;"><?php echo $rowvc['vpt10']; ?></td>
                            <td style="background-color: <?php echo $vpt11c;?>;"><?php echo $rowvc['vpt11']; ?></td>
                            <td style="background-color: <?php echo $vpt12c;?>;"><?php echo $rowvc['vpt12']; ?></td>
                            <td style="background-color: <?php echo $vpt13c;?>;"><?php echo $rowvc['vpt13']; ?></td>
                            <td style="background-color: <?php echo $vpt14c;?>;"><?php echo $rowvc['vpt14']; ?></td>
                            

                            <td><?php echo $rowvc['mt1']; ?></td>
                            <td><?php echo $rowvc['mb1']; ?></td>
                            <td style="background-color: <?php echo $mtc1;?>;"><?php echo number_format((float)$mtp1, 2, '.', ''); ?></td>
                            <td><?php echo $rowvc['mt2']; ?></td>
                            <td><?php echo $rowvc['mb2']; ?></td>
                            <td style="background-color: <?php echo $mtc2;?>;"><?php echo number_format((float)$mtp2, 2, '.', ''); ?></td>
                            <td><?php echo $rowvc['mt3']; ?></td>
                            <td><?php echo $rowvc['mb3']; ?></td>
                            <td style="background-color: <?php echo $mtc3;?>;"><?php echo number_format((float)$mtp3, 2, '.', ''); ?></td>
                            <td><?php echo $rowvc['mt4']; ?></td>
                            <td><?php echo $rowvc['mb4']; ?></td>
                            <td style="background-color: <?php echo $mtc4;?>;"><?php echo number_format((float)$mtp4, 2, '.', ''); ?></td>
                            <td><?php echo $rowvc['mt5']; ?></td>
                            <td><?php echo $rowvc['mb5']; ?></td>
                            <td style="background-color: <?php echo $mtc5;?>;"><?php echo number_format((float)$mtp5, 2, '.', ''); ?></td>
                            <td><?php echo $rowvc['mt6']; ?></td>
                            <td><?php echo $rowvc['mb6']; ?></td>
                            <td style="background-color: <?php echo $mtc6;?>;"><?php echo number_format((float)$mtp6, 2, '.', ''); ?></td>
                            <td><?php echo $rowvc['mt7']; ?></td>
                            <td><?php echo $rowvc['mb7']; ?></td>
                            <td style="background-color: <?php echo $mtc7;?>;"><?php echo number_format((float)$mtp7, 2, '.', ''); ?></td>
                            <td><?php echo $rowvc['mt8']; ?></td>
                            <td><?php echo $rowvc['mb8']; ?></td>
                            <td style="background-color: <?php echo $mtc8;?>;"><?php echo number_format((float)$mtp8, 2, '.', ''); ?></td>

                            <td><?php echo $rowvc['mdbm']; ?></td>
                            <td><?php echo $rowvc['mdbc']; ?></td>
                            <td><?php echo $rowvc['mdbi']; ?></td>
                            <td style="background-color: <?php echo $mdbcolc;?>;"><?php echo $rowvc['mdbcol']; ?></td>
                            
                          
                            <td><?php echo $rowvc['mndbm']; ?></td>
                            <td><?php echo $rowvc['mndbc']; ?></td>
                            <td><?php echo $rowvc['mndbi']; ?></td>
                            <td style="background-color: <?php echo $mndbcolc;?>;"><?php echo $rowvc['mndbcol']; ?></td>

                            
                            <td><?php echo $rowvc['insulation']; ?></td>
                            <td><?php echo $rowvc['sc']; ?></td>
                            <td><?php echo $rowvc['rc']; ?></td>
                            <td><?php echo $rowvc['rh']; ?></td>
                            <td><?php echo $rowvc['rpm']; ?></td>
                            <td><?php echo $rowvc['remark']; ?></td>


                        </tr>


                        <?php  
                        
                            $M++;

                            if($j==12)
                            {
                              $L=1;
                            }
                            if($i==$ty && $j==$tm)
                            {
                              //exit();
                              break;
                            }

                          }
                        if($i==$ty)
                        {
                          $K=$tm;
                        }
                        }
                    
                ?>

            </table>

        </div>


<?php
}
?>

</div>
</main>
<?php
  include('masterfooter.php')
?>