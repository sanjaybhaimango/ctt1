<?php
include('session.php');
include('masternav.php');
$error="";
if (isset($_POST['delete']))
{
    $delpid = $_POST['delpid'];
    $target_dir = "../Assets/performa/";
    $target_file1= $target_dir.$delpid.".pdf";

    $sqld = "DELETE FROM `performa` WHERE `per_id`='".$delpid."'";
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
if (isset($_POST['submit']) && $_POST['performa_name'] != "")
{
    $ses_sqlau = mysqli_query($db,"SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'ctt' AND TABLE_NAME = 'performa'");
    $rowau = mysqli_fetch_array($ses_sqlau,MYSQLI_ASSOC);
    $pid = $rowau['AUTO_INCREMENT'];

    $target_dir = "../Assets/performa/";
    $target_file1= $target_dir.$pid.".pdf";
    $uploadOk = 1;
    $pdfFileType = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
    $sclass_id = $_POST['sclass'];
    $scsection = $_POST['scsection'];
    if (file_exists($target_file1)) {
        unlink("$target_file1");
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    $error= "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["performa_file"]["tmp_name"], $target_file1)) {
        $policy_name=$_POST['performa_name'];
        $pdfname=$pid.".pdf";
        

        $sql = "INSERT INTO `performa`(`per_name`, `per_loc`, `sclass_id`, `scsection`) VALUES ('".$policy_name."','".$pdfname."', '".$sclass_id."', '".$scsection."')";
        if ($db->query($sql) === TRUE) {
            echo '<script>alert("Performa uploaded Successfully");</script>';
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
        <h2 class="main-title" style="color:#ffffff;">Performa Manager</h2>
        <div class="row">        
            <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
            <form class="form col-sm-12" action="" method="post" enctype="multipart/form-data">
                <table style="width:100%">
                    <tr>
                        <td>
                            <div class="col-sm-5">
                                <label>Performa Name</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-5">
                                <input class="form-input" type="text" name="performa_name" id="performa_name" placeholder="Name of Performa" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="col-sm-6">
                                <label>Performa (.pdf)</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-5">
                                <input class="form-input" type="file" id="performa_file" name="performa_file" onchange="fnUpload()" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                    <td>
                        <div class="col-sm-5">
                            <label>Ship Class</label>
                        </div>
                    </td>
                    <td>
                        <div class="col-sm-5">
                            <select class="form-input" name="sclass" required>
                                <option>--Select--</option>
                                <?php
                                    $sqlp = mysqli_query($db,"select * from sclass");   
                                    if($sqlp) 
                                    {
                                        $i = 1;
                                        while($sclass = mysqli_fetch_assoc($sqlp))
                                        {
                                ?>
                                    <option value="<?php echo $sclass['sclass_id'];?>"><?php echo $sclass['sclass_name'];?></option>
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
        <h2 class="main-title" style="color:#ffffff;">Performa Details</h2>
        <div class="row" style="border-radius:10px; background-color:#ffffff; padding: 50px;">
            <div class="users-table table-wrapper" style="width: 100%; overflow-y:auto; max-height: 450px; width:100% !important;">
                <table class="posts-table" style="width:100%">
                    <thead>
                        <tr class="users-table-info">
                            <th class="">Sno</th>
                            <th class="">Performa Name</th>
                            <th class="">Ship Class</th>
                            <th class="" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sqlp = mysqli_query($db,"select performa.per_id, performa.per_name, performa.per_loc, sclass.sclass_name from performa, sclass where sclass.sclass_id=performa.sclass_id order by sclass.sclass_name asc");   
                            if($sqlp) 
                            {
                                $i = 1;
                                while($policies = mysqli_fetch_assoc($sqlp))
                                {
                        ?>
                        <tr class="small">
                            <td><?php echo $i;?></td>
                            <td><?php echo $policies['per_name'];?></td>
                            <td><?php echo $policies['sclass_name'];?></td>
                            <td><a href="../Assets/performa/<?php echo $policies['per_loc'];?>" target="_blank">View</a> </td>
                            <td class="">
                                <div class="btn-group" role="group">
                                    <form method="post" action="">
                                        <input type="hidden" value="<?php echo $policies['per_id'];?>" name="delpid">
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
            var fileUpload = document.getElementById("performa_file");
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