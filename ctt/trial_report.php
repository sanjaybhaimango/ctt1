<?php
include('session.php');
include('usernav.php');
?>


<main class="main">
    <div class="container col-sm-12" style="margin-top: 30px !important;">
        <h2 class="main-title" style="color:white;"> Engineering</h2>
        <div class="row" style="border-radius:10px;background-color: rgb(0 0 0 / 23%);padding: 50px; color:white;">
            <div style="width: 100%; padding-top: 15px; color:white;">
                <table border="1" style="width: 100%; border-collapse:collapse;text-align:center;background-color: rgb(0 0 0 / 23%);">
                        <tr>
                            <th>Sl. No.</th>
                            <th>Trial Name</th>
                            <th class="">ACTION</th>
                        </tr>
                        <?php
                        $SCls = $row1['ship_id'];
                        $sqlp = mysqli_query($db,"select trial.tri_id, trial.tri_name, trial.tri_loc from trial where trial.ship_id ='$SCls' AND trial.scsection = 'Engineering' order by trial.tri_name asc");   
                            if($sqlp) 
                            {
                                $i = 1;
                                while($policies = mysqli_fetch_assoc($sqlp))
                                {
                        ?>
                        <tr class="small">
                            <td><?php echo $i;?></td>
                            <td><?php echo $policies['tri_name'];?></td>
                            <td><a href="../Assets/TrialReport/<?php echo $policies['tri_loc'];?>" target="_blank">View</a> </td>
                        </tr>
                        <?php
                                    $i++;
                                }
                            }
                        ?>
                </table>
            </div>
       
        </div>
        <h2 class="main-title" style="color:white;"> Electrical</h2>
        <div class="row" style="border-radius:10px;background-color: rgb(0 0 0 / 23%);padding: 50px; color:white;">
            <div style="width: 100%; padding-top: 15px; color:white;">
                <table border="1" style="width: 100%; border-collapse:collapse;text-align:center;background-color: rgb(0 0 0 / 23%);">
                        <tr>
                            <th>Sl. No.</th>
                            <th>Trial Name</th>
                            <th class="">ACTION</th>
                        </tr>
                        <?php
                        $SCls = $row1['ship_id'];
                        $sqlp = mysqli_query($db,"select trial.tri_id, trial.tri_name, trial.tri_loc from trial where trial.ship_id ='$SCls' AND trial.scsection = 'Electrical' order by trial.tri_name asc");   
                            if($sqlp) 
                            {
                                $i = 1;
                                while($policies = mysqli_fetch_assoc($sqlp))
                                {
                        ?>
                        <tr class="small">
                            <td><?php echo $i;?></td>
                            <td><?php echo $policies['tri_name'];?></td>
                            <td><a href="../Assets/TrialReport/<?php echo $policies['tri_loc'];?>" target="_blank">View</a> </td>
                        </tr>
                        <?php
                                    $i++;
                                }
                            }
                        ?>
                </table>
            </div>
        
    </div>
</main>




<?php
  include('masterfooter.php');
?>