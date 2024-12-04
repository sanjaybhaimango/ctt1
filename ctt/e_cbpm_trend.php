<?php
include('session.php');
include('masternav.php');
$error="";
?>


<main class="main users chart-page" id="skip-target">
    <div class="container">
    <h2 class="main-title" style="color:white">CBPM Data Trending</h2>
        <div class="row">        
            <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
            <form class="form col-sm-12" action="admin_cbpm_trend_view.php" method="get" enctype="multipart/form-data">
                <table style="width:100%">
                    <tr>
                        <td>
                            <div class="col-sm-4">
                                <label>Ship</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-4">                                
                                <select class="form-input" name="shipid" id="shipid" required>
                                    <option value="">--Select--</option>
                                    <?php
                                    $sqlp = mysqli_query($db,"select * from ships order by ship_name");   
                                        if($sqlp) 
                                        {
                                            $i = 1;
                                            while($eqptn = mysqli_fetch_assoc($sqlp))
                                            {
                                    ?>
                                        <option value="<?php echo $eqptn['ship_id'];?>"><?php echo $eqptn['ship_name'];?></option>
                                    <?php
                                            $i++;
                                            }
                                        }
                                        ?>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-4">
                                <label>Equipments</label>
                            </div>
                        </td>
                        <td colspan="3">
                            <div class="col-sm-4">
                                <select class="form-input" name="eqpt_id" id="eqpt_id" required>
                                    <option value="">--Select--</option>
                                    <?php
                                    $sqlp = mysqli_query($db,"select * from equipment order by eqpt_name");   
                                        if($sqlp) 
                                        {
                                            $i = 1;
                                            while($eqptn = mysqli_fetch_assoc($sqlp))
                                            {
                                    ?>
                                        <option value="<?php echo $eqptn['eqpt_id'];?>"><?php echo $eqptn['eqpt_name'];?></option>
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
                            <div class="col-sm-2">
                                <label>From Year</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-2">
                                <select class="form-input" name="fy" id="fy" required>
                                    <option value="">--Select--</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-2">
                                <label>From Month</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-2">
                                <select class="form-input" name="fm" id="fm" required>
                                    <option value="">--Select--</option>
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-2">
                                <label>To Year</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-2">
                                <select class="form-input" name="ty" id="ty" required>
                                    <option value="">--Select--</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-2">
                                <label>To Month</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-2">
                                <select class="form-input" name="tm" id="tm" required>
                                    <option value="">--Select--</option>
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                        </td>
                        </tr>
                        <tr>
                        <td>
                            <div class="col-sm-4">
                                <label>Vibration / Motor</label>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-4">
                                <select class="form-input" name="vm_id" id="vm_id">
                                    <option value="">--Select--</option>
                                    <option value="vpt1">PT 1</option>
                                    <option value="vpt2">PT 2</option>
                                    <option value="vpt3">PT 3</option>
                                    <option value="vpt4">PT 4</option>
                                    <option value="vpt5">PT 5</option>
                                    <option value="vpt6">PT 6</option>
                                    <option value="vpt7">PT 7</option>
                                    <option value="vpt8">PT 8</option>
                                    <option value="vpt9">PT 9</option>
                                    <option value="vpt10">PT 10</option>
                                    <option value="vpt11">PT 11</option>
                                    <option value="vpt12">PT 12</option>
                                    <option value="vpt13">PT 13</option>
                                    <option value="vpt14">PT 14</option>
                                    <option value="mdbm">Mdbm</option>
                                    <option value="mndbm">MNdbm</option>
                                </select>
                            </div>
                        </td> 
                        <td colspan="3">
                            <input class="form-btn primary-default-btn transparent-btn" type="submit" value="Graph" name="submit">
                        </td>
                        <td colspan="3">
                            <input class="form-btn primary-default-btn transparent-btn" type="submit" value="Next" name="submit">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    
    </div>
</main>



<script>
    $(document).ready(function(){
  $('#shipid').on('change', function(){
    var country_id = $(this).val();
    if(country_id){
      $.ajax({
        url: 'get_eqpt.php',
        type: 'POST',
        data: {shipid: shipid},
        success: function(data){
          $('#eqpt_id').html(data);
        }
      });
    } else {
      $('#eqpt_id').html('<option value="">--Select Equipment--</option>');
    }
  });
});

</script>

<?php
  include('masterfooter.php');
?>