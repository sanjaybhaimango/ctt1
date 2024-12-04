<?php
include('session.php');
include('usernav.php');
?>


<main class="main">
    <div class="container col-sm-12" style="margin-top: 30px !important;">
        <!--<h2 class="main-title" style="color:white;"> E-CBPM Manager</h2>-->
        <div class="row" style="border-radius:10px;background-color: rgb(0 0 0 / 23%);padding: 50px; color:white;">
            <div style="margin-left: auto; margin-right: 0;"><a href="addcbpmdata.php"><input type="button" name="Add" class="form-btn primary-default-btn transparent-btn" value="Add/ Update"></a></div>
            <div style="width: 100%; padding-top: 15px; color:white;">
                <table border="1" style="width: 100%; border-collapse:collapse;text-align:center;background-color: rgb(0 0 0 / 23%);">
                        <tr>
                            <th>SNO</th>
                            <th>MONTH</th>
                            <th>YEAR</th>
                            <th>NO. OF EQUIPMENTS</th>
                            <th class="">ACTION</th>
                        </tr>
                        <?php
                        
                        $sqlp = mysqli_query($db,"select cbpm.cbpm_id as cbpm_id, cbpm.month as month, cbpm.year as year from cbpm, user where user.ship_id = cbpm.ship_id group by year, month order by cbpm_id");   
                        if($sqlp) 
                        {
                            $i = 1;
                            while($policies = mysqli_fetch_assoc($sqlp))
                            {
                                $sqlpe = mysqli_query($db,"select count(eqpt_id) as eqpt from cbpm where cbpm.month = '".$policies['month']."' and cbpm.year = '".$policies['year']."' and cbpm.ship_id = '".$shipid."'");   
                                $sqlpet = mysqli_query($db,"select count(eqpt_id) as eqpt from semap, ships where semap.sclass_id=ships.sclass_id and ships.ship_id = '".$shipid."'");
                                $policieset = mysqli_fetch_assoc($sqlpet);
                                if($sqlpe) 
                                {
                                    $policiese = mysqli_fetch_assoc($sqlpe);
                              ?>
                              <tr class="small">
                                  <td><?php echo $i;?></td>
                                  <td><?php echo $policies['month'];?></td>
                                  <td><?php echo $policies['year'];?></td>
                                  <td><?php echo $policiese['eqpt'];?> / <?php echo $policieset['eqpt'];?></td>
                                  <td>
                                      <a href="ecbpm_view.php?ship_id=<?php echo $shipid;?>&month=<?php echo $policies['month'];?>&year=<?php echo $policies['year'];?>" class="btn btn-xs btn-info">View</a>
                                  </td>

                              </tr>
                              <?php
                              $i++;
                                }
                          }
                      }
                      ?>
                </table>
            </div>
        <div>
    </div>
</main>




<?php
  include('masterfooter.php');
?>