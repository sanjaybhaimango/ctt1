<?php
//error_reporting(0);
include('session.php');
include('masternav.php');
$error="";

require '../vendor/autoload.php'; // Include the PhpSpreadsheet autoloader

        use PhpOffice\PhpSpreadsheet\IOFactory;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $file = $_FILES["file"]["tmp_name"];

    // Verify if it's an Excel file (adjust file types as needed)
    if (pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION) == "xls" || pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION) == "xlsx") {
        

        $spreadsheet = IOFactory::load($file);
        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow();

        $ship_id = $worksheet->getCellByColumnAndRow(2, 2)->getValue();
        $month = $worksheet->getCellByColumnAndRow(4, 2)->getValue();
        $year = $worksheet->getCellByColumnAndRow(6, 2)->getValue();
        $isval = '1';
        for ($row = 6; $row <= $highestRow; $row++) { // Start from the second row
            $eqpt_id = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
            $vpt1 = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
            $vpt2 = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
            $vpt3 = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
            $vpt4 = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
            $vpt5 = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
            $vpt6 = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
            $vpt7 = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
            $vpt8 = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
            $vpt9 = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
            $vpt10 = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
            $vpt11 = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
            $vpt12 = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
            $vpt13 = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
            $vpt14 = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
            $mt1 = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
            $mb1 = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
            $mt2 = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
            $mb2 = $worksheet->getCellByColumnAndRow(20, $row)->getValue();
            $mt3 = $worksheet->getCellByColumnAndRow(21, $row)->getValue();
            $mb3 = $worksheet->getCellByColumnAndRow(22, $row)->getValue();
            $mt4 = $worksheet->getCellByColumnAndRow(23, $row)->getValue();
            $mb4 = $worksheet->getCellByColumnAndRow(24, $row)->getValue();
            $mt5 = $worksheet->getCellByColumnAndRow(25, $row)->getValue();
            $mb5 = $worksheet->getCellByColumnAndRow(26, $row)->getValue();
            $mt6 = $worksheet->getCellByColumnAndRow(27, $row)->getValue();
            $mb6 = $worksheet->getCellByColumnAndRow(28, $row)->getValue();
            $mt7 = $worksheet->getCellByColumnAndRow(29, $row)->getValue();
            $mb7 = $worksheet->getCellByColumnAndRow(30, $row)->getValue();
            $mt8 = $worksheet->getCellByColumnAndRow(31, $row)->getValue();
            $mb8 = $worksheet->getCellByColumnAndRow(32, $row)->getValue();
            $mdbm = $worksheet->getCellByColumnAndRow(33, $row)->getValue();
            $mdbc = $worksheet->getCellByColumnAndRow(34, $row)->getValue();
            $mdbi = $worksheet->getCellByColumnAndRow(35, $row)->getValue();
            $mdbcol = $worksheet->getCellByColumnAndRow(36, $row)->getValue();
            $mndbm = $worksheet->getCellByColumnAndRow(37, $row)->getValue();
            $mndbc = $worksheet->getCellByColumnAndRow(38, $row)->getValue();
            $mndbi = $worksheet->getCellByColumnAndRow(39, $row)->getValue();
            $mndbcol = $worksheet->getCellByColumnAndRow(40, $row)->getValue();
            $insulation = $worksheet->getCellByColumnAndRow(41, $row)->getValue();
            $sc = $worksheet->getCellByColumnAndRow(42, $row)->getValue();
            $rc = $worksheet->getCellByColumnAndRow(43, $row)->getValue();
            $rh = $worksheet->getCellByColumnAndRow(44, $row)->getValue();
            $rpm = $worksheet->getCellByColumnAndRow(45, $row)->getValue();
            $remark = $worksheet->getCellByColumnAndRow(46, $row)->getValue();
            
            // Insert data into the database
            $sql = "INSERT INTO `cbpm`(`ship_id`, `month`, `year`, `eqpt_id`, `vpt1`, `vpt2`, `vpt3`, `vpt4`, `vpt5`, `vpt6`, `vpt7`, `vpt8`, `vpt9`, `vpt10`, `vpt11`, `vpt12`, `vpt13`, `vpt14`, `mt1`, `mb1`, `mt2`, `mb2`, `mt3`, `mb3`, `mt4`, `mb4`, `mt5`, `mb5`, `mt6`, `mb6`, `mt7`, `mb7`, `mt8`, `mb8`, `mdbm`, `mdbc`, `mdbi`, `mdbcol`, `mndbm`, `mndbc`, `mndbi`, `mndbcol`, `insulation`, `sc`, `rc`, `rh`, `rpm`, `remark`, `date`, `isval`) VALUES ('$ship_id','$month','$year','$eqpt_id','$vpt1','$vpt2','$vpt3','$vpt4','$vpt5','$vpt6','$vpt7','$vpt8','$vpt9','$vpt10','$vpt11','$vpt12','$vpt13','$vpt14','$mt1','$mb1','$mt2','$mb2','$mt3','$mb3','$mt4','$mb4','$mt5','$mb5','$mt6','$mb6','$mt7','$mb7','$mt8','$mb8','$mdbm','$mdbc','$mdbi','$mdbcol','$mndbm','$mndbc','$mndbi','$mndbcol','$insulation','$sc','$rc','$rh','$rpm','$remark', NOW(), '$isval')";
            
            if ($db->query($sql) !== TRUE) {
                echo "Error: " . $sql . "<br>" . $db->error;
            }
        }

        echo '<script>alert("Data uploaded successfully.");</script>';
    } else {
        echo "Invalid file format. Please upload an Excel file.";
    }
}
$db->close();


?>


<main class="main">
  <div class="container col-sm-11">
    <h2 class="main-title" style="color:#ffffff;">Upload CBPM Data</h2>
    <div class="row">        
        <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
            <form class="form col-sm-12" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
                <label>Select Excel File</label>
                <input class="form-input" type="file" name="file" accept=".xls, .xlsx" required>
                <input class="form-btn primary-default-btn transparent-btn" type="submit" value="Upload">                        
            </form>
        </div>
    </div>
</main>

<?php
  include('masterfooter.php')
?>