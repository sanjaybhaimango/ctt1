<?php
include('session.php');
include('masternav.php');
$error="";
if (isset($_POST['delete']))
{
    $delpid = $_POST['delpid'];

    $sqld = "DELETE FROM `sclass` WHERE `sclass_id`='".$delpid."'";
    if ($db->query($sqld) === TRUE) 
    {
        echo '<script>alert("Data Deleted Successfully");</script>';
    }
    else
    {
        echo '<script>alert("Delete Interrupted");</script>';
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST") 
{
       // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) 
    {    
        $sclass=$_POST['sclass'];
        $sql = "insert into sclass (sclass_name) values('$sclass')";

        if ($db->query($sql) === TRUE) 
        {
            echo '<script>alert("Saved Successfully");</script>';
        } 
        else 
        {
        echo "Error updating record: " . $db->error;
        }

    } 
}
?>


<main class="main">
  <div class="container col-sm-11">
    <h2 class="main-title"><?php echo $row['name'] ?> - Add Ship Class</h2>
    <div class="row">
        
    <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
        <form class="form col-sm-12" action="" method="post" enctype="multipart/form-data">
            <table style="width:100%">
                <tr>
                    <td>
                        <div class="col-sm-5">
                            <label>Class Name</label>
                        </div>
                    </td>
                    <td>
                        <div class="col-sm-5">
                            <input class="form-input" type="text" name="sclass" placeholder="Ship Class Name" required>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input class="form-btn primary-default-btn transparent-btn" type="submit" value="Add" name="submit">
                    </td>
                </tr>
            </table>
        </form>
    </div>
  </div>

  <div class="container col-sm-12" style="margin-top: 30px !important;">
        <h2 class="main-title">Ship Class Details</h2>
        <div class="row" style="border-radius:10px; background-color:#ffffff; padding: 50px;">
            <div class="users-table table-wrapper" style="width: 100%;">
                <table class="posts-table" style="width:100%">
                    <thead>
                        <tr class="users-table-info">
                            <th class="">Sno</th>
                            <th class="">Ship Class Name</th>
                            <th class="">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sqlp = mysqli_query($db,"select * from sclass order by sclass_name");   
                            if($sqlp) 
                            {
                                $i = 1;
                                while($ships = mysqli_fetch_assoc($sqlp))
                                {
                        ?>
                        <tr class="small">
                            <td><?php echo $i;?></td>
                            <td><?php echo $ships['sclass_name'];?></td>
                            <td class="">
                                <div class="btn-group" role="group">
                                    <form method="post" action="">
                                        <input type="hidden" value="<?php echo $ships['sclass_id'];?>" name="delpid">
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


<?php
  include('masterfooter.php');
?>