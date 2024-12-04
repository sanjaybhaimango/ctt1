<?php
error_reporting(0);
include('session.php');
include('masternav.php');
$error="";
$year=$_GET['year'];
$month=$_GET['month'];
$sid=$_GET['shipid'];
$ses_sql1 = mysqli_query($db,"select * from ships where ship_id = '$sid' ");
   
$row1 = mysqli_fetch_array($ses_sql1,MYSQLI_ASSOC);


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

<main class="main users chart-page" id="skip-target">
    <div class="container">
        <h2 class="main-title" style="color: white;"><?php echo $row1['ship_name'] ?> - View CBPM Data</h2>
        <div class="row" style="overflow-x:auto; width:100% !important; margin-left:10px; background-color: rgb(0 0 0 / 40%);">        
            <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
            <table border="1" style="border-collapse:collapse;text-align:center; color:#ffffff;">
                <tr>
                    <th rowspan="3">Ser.</th>
                    <th rowspan="3">Equipment Name</th>
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
                $sqlp = mysqli_query($db,"select * from equipment where eqpt_id in (select eqpt_id from semap, ships where ships.ship_id = '$sid' and semap.sclass_id=ships.sclass_id)");   
                
                if($sqlp)
                {
                    $i = 1;
                    while($eqptn = mysqli_fetch_assoc($sqlp))
                    {
                        /*$year=$_GET['year'];
                          $month=$_GET['month'];
                          $sid=$_GET['ship_id']; */
                          $eqpt = $eqptn['eqpt_id'];
                          $eqptname = $eqptn['eqpt_name'];
                          $sqlvc = mysqli_query($db,"select * from cbpm where eqpt_id='$eqpt' and ship_id = '$sid' and year = '$year' and month='$month' and isval=1");   
                          $rowvc = mysqli_fetch_array($sqlvc,MYSQLI_ASSOC);
                        
                          if($rowvc['mt1'] != null || $rowvc['mb1'] != null)
                          {
                            $mtp1 = ((($rowvc['mt1']-$rowvc['mb1'])/$rowvc['mt1'])*100);
                          }
                          else
                          {
                            $mtp1 = 'NIL';
                          }
                          if($rowvc['mt1'] != null || $rowvc['mb1'] != null)
                          {
                            $mtp2 = ((($rowvc['mt2']-$rowvc['mb2'])/$rowvc['mt2'])*100);
                          }
                          else
                          {
                            $mtp2 = 'NIL';
                          }
                          if($rowvc['mt1'] != null || $rowvc['mb1'] != null)
                          {
                            $mtp3 = ((($rowvc['mt3']-$rowvc['mb3'])/$rowvc['mt3'])*100);
                          }
                          else
                          {
                            $mtp3 = 'NIL';
                          }
                          if($rowvc['mt1'] != null || $rowvc['mb1'] != null)
                          {
                            $mtp4 = ((($rowvc['mt4']-$rowvc['mb4'])/$rowvc['mt4'])*100);
                          }
                          else
                          {
                            $mtp4 = 'NIL';
                          }
                          if($rowvc['mt1'] != null || $rowvc['mb1'] != null)
                          {
                            $mtp5 = ((($rowvc['mt5']-$rowvc['mb5'])/$rowvc['mt5'])*100);
                          }
                          else
                          {
                            $mtp5 = 'NIL';
                          }
                          if($rowvc['mt1'] != null || $rowvc['mb1'] != null)
                          {
                            $mtp6 = ((($rowvc['mt6']-$rowvc['mb6'])/$rowvc['mt6'])*100);
                          }
                          else
                          {
                            $mtp6 = 'NIL';
                          }
                          if($rowvc['mt1'] != null || $rowvc['mb1'] != null)
                          {
                            $mtp7 = ((($rowvc['mt7']-$rowvc['mb7'])/$rowvc['mt7'])*100);
                          }
                          else
                          {
                            $mtp7 = 'NIL';
                          }
                          if($rowvc['mt1'] != null || $rowvc['mb1'] != null)
                          {
                            $mtp8 = ((($rowvc['mt8']-$rowvc['mb8'])/$rowvc['mt8'])*100);
                          }
                          else
                          {
                            $mtp8 = 'NIL';
                          }



                            //------------------MAIN ENGIN----------------------//
                            if($rowvc['eqpt_id'] == 4)
                            {
                                if($rowvc['vpt1']>7)
                                {
                                    $vpt1c = 'red';
                                }
                                else
                                {
                                    $vpt1c = 'transparent';
                                }

                                if($rowvc['vpt2']>7)
                                {
                                    $vpt2c = 'red';
                                }
                                else
                                {
                                    $vpt2c = 'transparent';
                                }
                                
                                if($rowvc['vpt3']>7)
                                {
                                    $vpt3c = 'red';
                                }
                                else
                                {
                                    $vpt3c = 'transparent';
                                }

                                if($rowvc['vpt4']>7)
                                {
                                    $vpt4c = 'red';
                                }
                                else
                                {
                                    $vpt4c = 'transparent';
                                }

                                if($rowvc['vpt5']>7)
                                {
                                    $vpt5c = 'red';
                                }
                                else
                                {
                                    $vpt5c = 'transparent';
                                }

                                if($rowvc['vpt6']>7)
                                {
                                    $vpt6c = 'red';
                                }
                                else
                                {
                                    $vpt6c = 'transparent';
                                }

                                if($rowvc['vpt7']>7)
                                {
                                    $vpt7c = 'red';
                                }
                                else
                                {
                                    $vpt7c = 'transparent';
                                }

                                if($rowvc['vpt8']>7)
                                {
                                    $vpt8c = 'red';
                                }
                                else
                                {
                                    $vpt8c = 'transparent';
                                }

                                if($rowvc['vpt9']>7)
                                {
                                    $vpt9c = 'red';
                                }
                                else
                                {
                                    $vpt9c = 'transparent';
                                }

                                if($rowvc['vpt10']>7)
                                {
                                    $vpt10c = 'red';
                                }
                                else
                                {
                                    $vpt10c = 'transparent';
                                }

                                if($rowvc['vpt11']>7)
                                {
                                    $vpt11c = 'red';
                                }
                                else
                                {
                                    $vpt11c = 'transparent';
                                }

                                if($rowvc['vpt12']>7)
                                {
                                    $vpt12c = 'red';
                                }
                                else
                                {
                                    $vpt12c = 'transparent';
                                }

                                if($rowvc['vpt13']>7)
                                {
                                    $vpt13c = 'red';
                                }
                                else
                                {
                                    $vpt13c = 'transparent';
                                }

                                if($rowvc['vpt14']>7)
                                {
                                    $vpt14c = 'red';
                                }
                                else
                                {
                                    $vpt14c = 'transparent';
                                }
                            }
                            else
                            {
                                $vpt1c = 'transparent';
                                $vpt2c = 'transparent';
                                $vpt3c = 'transparent';
                                $vpt4c = 'transparent';
                                $vpt5c = 'transparent';
                                $vpt6c = 'transparent';
                                $vpt7c = 'transparent';
                                $vpt8c = 'transparent';
                                $vpt9c = 'transparent';
                                $vpt10c = 'transparent';
                                $vpt11c = 'transparent';
                                $vpt12c = 'transparent';
                                $vpt13c = 'transparent';
                                $vpt14c = 'transparent';
                            }
                            //-------------------------------------------------//
                            ?>

                        <tr>
                            <td><?php echo $i; ?></td>
                            <td style="min-width: 230px !important;"><?php echo $eqptname; ?></td>
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
                            <td><?php echo number_format((float)$mtp1, 2, '.', ''); ?></td>
                            <td><?php echo $rowvc['mt2']; ?></td>
                            <td><?php echo $rowvc['mb2']; ?></td>
                            <td><?php echo number_format((float)$mtp2, 2, '.', ''); ?></td>
                            <td><?php echo $rowvc['mt3']; ?></td>
                            <td><?php echo $rowvc['mb3']; ?></td>
                            <td><?php echo number_format((float)$mtp3, 2, '.', ''); ?></td>
                            <td><?php echo $rowvc['mt4']; ?></td>
                            <td><?php echo $rowvc['mb4']; ?></td>
                            <td><?php echo number_format((float)$mtp4, 2, '.', ''); ?></td>
                            <td><?php echo $rowvc['mt5']; ?></td>
                            <td><?php echo $rowvc['mb5']; ?></td>
                            <td><?php echo number_format((float)$mtp5, 2, '.', ''); ?></td>
                            <td><?php echo $rowvc['mt6']; ?></td>
                            <td><?php echo $rowvc['mb6']; ?></td>
                            <td><?php echo number_format((float)$mtp6, 2, '.', ''); ?></td>
                            <td><?php echo $rowvc['mt7']; ?></td>
                            <td><?php echo $rowvc['mb7']; ?></td>
                            <td><?php echo number_format((float)$mtp7, 2, '.', ''); ?></td>
                            <td><?php echo $rowvc['mt8']; ?></td>
                            <td><?php echo $rowvc['mb8']; ?></td>
                            <td><?php echo number_format((float)$mtp8, 2, '.', ''); ?></td>

                            <td><?php echo $rowvc['mdbm']; ?></td>
                            <td><?php echo $rowvc['mdbc']; ?></td>
                            <td><?php echo $rowvc['mdbi']; ?></td>
                            <td><?php echo $rowvc['mdbcol']; ?></td>
                            <td><?php echo $rowvc['mndbm']; ?></td>
                            <td><?php echo $rowvc['mndbc']; ?></td>
                            <td><?php echo $rowvc['mndbi']; ?></td>
                            <td><?php echo $rowvc['mndbcol']; ?></td>

                            
                            <td><?php echo $rowvc['insulation']; ?></td>
                            <td><?php echo $rowvc['sc']; ?></td>
                            <td><?php echo $rowvc['rc']; ?></td>
                            <td><?php echo $rowvc['rh']; ?></td>
                            <td><?php echo $rowvc['rpm']; ?></td>
                            <td><?php echo $rowvc['remark']; ?></td>


                        </tr>


                        <?php  
                        $isval= $isval + $rowvc['isval'];
                        $i++;
                    }
                }
                ?>

            </table>
            <?php
            if($isval != 0)
            {
                echo "<h4 style='color:white;'>Validated</h4>";
            }
            else
            {
                echo "<h4 style='color:red;'>Data Not Validated yet</h4>";
            }
            ?>

        </div>
    </div>
</main>


<?php


if(isset($_POST['valsub']))
{
    $usid = $_POST['sid'];
    $uyear = $_POST['year'];
    $umonth = $_POST['month'];

    $sql = "update cbpm set `isval` = 1 where year = '$uyear' and month = '$umonth' and ship_id = '$usid'";
    if ($db->query($sql) === TRUE) 
    {
        echo '<script>alert("Data Validated Successfully");</script>';
    } 
    else 
    {
    echo "Error Validating Data: " . $db->error;
    }

}
















  include('masterfooter.php')
?>