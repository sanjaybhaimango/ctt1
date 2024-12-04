<?php
include('conn.php');
$shipid12 = $_POST['shipid'];
$html = '<option value="">--Select Equipment--</option>';
        $sqlp1 = mysqli_query($db,"select * from equipment where eqpt_id in (select semap.eqpt_id from semap, ships where semap.sclass_id=ships.sclass_id and ships.ship_id = '$shipid12' )");   
            if($sqlp1) 
                {
                    $i = 1;
                    while($eqptn = mysqli_fetch_assoc($sqlp1))
                    {
                        $html .= '<option value="'.$eqptn['eqpt_id'].'">'.$eqptn['eqpt_id'].'</option>';
                        $i++;
                    }
                }
echo $html;
?>
