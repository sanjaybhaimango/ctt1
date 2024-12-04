<?php
include('session.php');
include('masternav.php');
$error="";
$target_file="";
$target_dir = "";



if(isset($_POST['submit'])) 
{
    $ses_sqlau = mysqli_query($db,"SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'ctt' AND TABLE_NAME = 'home_page'");
    $rowau = mysqli_fetch_array($ses_sqlau,MYSQLI_ASSOC);
    $pid = $rowau['AUTO_INCREMENT'];

    $target_dir = "../home_sliders/";
    $target_file= $target_dir.$pid.".jpg";
    
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $error= "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $error= "File is not an image.";
        $uploadOk = 0;
    }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        unlink("$target_file");
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
    $error= "Sorry, your file is too large.";
    $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    $error= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    $error= "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $idesc=$_POST['idesc'];
        $imgname=$pid.".jpg";
        $sql = "insert into home_page (`home_description`, `home_image`) values ('".$idesc."', '".$imgname."')";

        if ($db->query($sql) === TRUE) {
            echo '<script>alert("Photo uploaded Successfully");</script>';
        } else {
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
    <h2 class="main-title"><?php echo $row['name'] ?> - Upload Excel</h2>
    <div class="row">
        
    <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
        <form class="form col-sm-12" action="" method="post" enctype="multipart/form-data">
            <table style="width:100%">
                <tr>
                    <td>
                        <div class="col-sm-6">
                            <label>Upload Excel</label>
                        </div>
                    </td>
                    <td>
                        <div class="col-sm-5">
                            <input class="form-input" type="file" name="fileToUpload" id="fileToUpload" required>
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
</main>


<?php
  include('masterfooter.php');
?>