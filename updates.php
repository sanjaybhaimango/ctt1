<?php
    error_reporting(0);    
    $header_text = "Publications";
    include('header.php');
    include('ctt/conn.php');
?>
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="padding-left: 0px; padding-right:0px; margin-top:10px;">
                    <div style="text-align: center; padding-top:7px; padding-bottom:2px; color:white;"><h5>Publications</h5></div>
                    <div class="table-responsive" style="padding:10px; overflow-x:auto; height: 420px; width:100% !important;">
                        <table border="1" style="width:100%; color: white;" class="display table">
                            <thead>
                                <tr style="background-color: #bdbdbd4d;">
                                    <th>Sl No</th>
                                    <th>Publications</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $sqlp = mysqli_query($db,"select * from updates order by up_id desc");   
                                if($sqlp) 
                                {
                                    $i = 1;
                                    while($policies = mysqli_fetch_assoc($sqlp))
                                    {
                                        if($i%2==0)
                                        {
                                            $sbtrcol = '#bdbdbd4d';
                                        }
                                        else
                                        {
                                            $sbtrcol = 'transparent';
                                        }
                                ?>  
                                    
                                

                                    <tr style="background-color: <?php echo $sbtrcol;?>;">
                                        <td><?php echo $i;?></td>
                                        <td><?php echo $policies['up_name'];?></td>
                                        <td><a href="Assets/updates/<?php echo $policies['up_loc'];?>" target="_blank" style="text-decoration:none; color:#ffffff;">Download</a></td>
                                    </tr>    



                                    <?php
                                        $i++;
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


<?php
include('footer.php');
?>