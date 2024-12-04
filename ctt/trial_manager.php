<?php
include('session.php');
include('masternav.php');
$error="";
if (isset($_POST['delete']))
{
    $delpid = $_POST['delpid'];
    $target_dir = "../Assets/TrialReport/";
    $target_file1= $target_dir.$delpid.".pdf";

    $sqld = "DELETE FROM `trial` WHERE `tri_id`='".$delpid."'";
    if ($db->query($sqld) === TRUE) 
    {
        unlink("$target_file1");
        echo '<script>alert("File Deleted Successfully");</script>';
    }
    else
    {
        echo '<script>alert("Delete Interrupted");</script>';
    }
}
if (isset($_POST['submit']) && $_POST['tri_name'] != "")
{
    $ses_sqlau = mysqli_query($db,"SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'ctt' AND TABLE_NAME = 'trial'");
    $rowau = mysqli_fetch_array($ses_sqlau,MYSQLI_ASSOC);
    $pid = $rowau['AUTO_INCREMENT'];

    $target_dir = "../Assets/TrialReport/";
    $target_file1= $target_dir.$pid.".pdf";
    $uploadOk = 1;
    $pdfFileType = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
    $ship_ids = $_POST['ships'];
    $scsection = $_POST['scsection'];
    if (file_exists($target_file1)) {
        unlink("$target_file1");
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    $error= "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["tri_file"]["tmp_name"], $target_file1)) {
        $policy_name=$_POST['tri_name'];
        $pdfname=$pid.".pdf";
        $sql="";
        $sqlsb = mysqli_query($db,"select count(tri_id) as countid from trial where tri_name = '".$policy_name."' AND ship_id = '".$ship_ids."' AND scsection = '".$scsection."' ");
        while($tcount = mysqli_fetch_assoc($sqlsb))
        {
            if($tcount['countid']==0)
            {
                $sql = "INSERT INTO `trial`(`tri_name`, `tri_loc`, `ship_id`, `scsection`) VALUES ('".$policy_name."','".$pdfname."', '".$ship_ids."', '".$scsection."')";
            }
            else
            {
                $sql = "UPDATE `trial` set `tri_loc`='".$pdfname."' where tri_name = '".$policy_name."' AND ship_id = '".$ship_ids."' AND scsection = '".$scsection."' ";
            }
        }

        if ($db->query($sql) === TRUE) {
            echo '<script>alert("Trial uploaded Successfully");</script>';
        } else 
        {
        echo "Error updating record: " . $db->error;
        }

            } else {
                $error= "Sorry, there was an error uploading your file.";
            }
    }


}
?>


<main class="main">
    <div class="container col-sm-11">
        <h2 class="main-title" style="color:#ffffff;">Trial Manager</h2>
        <div class="row">        
            <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
            <form class="form col-sm-12" action="" method="post" enctype="multipart/form-data">
                <table style="width:100%">
                    <tr>
                        <td>
                            <div class="col-sm-5">
                                <label>Trial Name</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-5">
                                <select class="form-input" name="tri_name" id="tri_name" required>
                                <option>--Select--</option>
                                <?php
                                    $sqlpS = mysqli_query($db,"select * from TRIAL_NAMES order by name");   
                                    if($sqlpS) 
                                    {
                                        $i = 1;
                                        while($TRIAL_NAME = mysqli_fetch_assoc($sqlpS))
                                        {
                                ?>
                                    <option value="<?php echo $TRIAL_NAME['NAME'];?>"><?php echo $TRIAL_NAME['NAME'];?></option>
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
                        <td>
                            <div class="col-sm-6">
                                <label>Trial (.pdf)</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-5">
                                <input class="form-input" type="file" id="tri_file" name="tri_file" onchange="fnUpload()" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                    <td>
                        <div class="col-sm-5">
                            <label>Ship Name</label>
                        </div>
                    </td>
                    <td>
                        <div class="col-sm-5">
                            <select class="form-input" name="ships" required>
                                <option>--Select--</option>
                                <?php
                                    $sqlp = mysqli_query($db,"select * from ships");   
                                    if($sqlp) 
                                    {
                                        $i = 1;
                                        while($ships = mysqli_fetch_assoc($sqlp))
                                        {
                                ?>
                                    <option value="<?php echo $ships['ship_id'];?>"><?php echo $ships['ship_name'];?></option>
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
                    <td>
                        <div class="col-sm-5">
                            <label>Section</label>
                        </div>
                    </td>
                    <td>
                        <div class="col-sm-5">
                            <select class="form-input" name="scsection" required>
                                <option>--Select--</option>
                                <option value="Electrical">Electrical</option>
                                <option value="Engineering">Engineering</option>                                
                            </select>
                        </div>
                    </td>
                </tr>
                    <tr>
                        <td colspan="2">
                            <input class="form-btn primary-default-btn transparent-btn" type="submit" value="Upload" name="submit">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <div class="container col-sm-12" style="margin-top: 30px !important;">
        <h2 class="main-title" style="color:#ffffff;">Trial Details</h2>
        <div class="row" style="border-radius:10px; background-color:#ffffff; padding: 50px;">
            <div class="users-table table-wrapper" style="width: 100%; overflow-y:auto; max-height: 450px; width:100% !important;">
                <table class="posts-table" style="width:100%">
                    <thead>
                        <tr class="users-table-info">
                            <th class="">Sno</th>
                            <th class="">Trial Name</th>
                            <th class="">Ship Name</th>
                            <th class="">Section</th>
                            <th class="" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sqlp = mysqli_query($db,"select trial.tri_id, trial.tri_name, trial.scsection, trial.tri_loc, ships.ship_name from trial, ships where ships.ship_id=trial.ship_id order by ships.ship_name asc");   
                            if($sqlp) 
                            {
                                $i = 1;
                                while($policies = mysqli_fetch_assoc($sqlp))
                                {
                        ?>
                        <tr class="small">
                            <td><?php echo $i;?></td>
                            <td><?php echo $policies['tri_name'];?></td>
                            <td><?php echo $policies['ship_name'];?></td>
                            <td><?php echo $policies['scsection'];?></td>
                            <td><a href="../Assets/TrialReport/<?php echo $policies['tri_loc'];?>" target="_blank">View</a> </td>
                            <td class="">
                                <div class="btn-group" role="group">
                                    <form method="post" action="">
                                        <input type="hidden" value="<?php echo $policies['tri_id'];?>" name="delpid">
                                        <input class="form-btn primary-default-btn transparent-btn" type="submit" value="Delete" name="delete">
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php
                                    $i++;
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        <div>
    </div>
</main>
<script src="js/jquery.min.js"></script>
<script>
    function fnUpload() 
    {
            var fileUpload = document.getElementById("tri_file");
            if (typeof (fileUpload.files) != "undefined") {
                var size = parseFloat(fileUpload.files[0].size / 5024).toFixed(2);
                if(parseInt(size)>6000){
                  alert("Can't Upload Image more than 5 MB Size.")
                    $('#hotel_img').val('');
                }
                //alert(size + " KB.");
            } else {
                alert("This browser does not support HTML5.");
            }
    }
</script>

<?php
  include('masterfooter.php');
?>