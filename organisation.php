<?php
    error_reporting(0);    
    $header_text = "Organisation Chart";
    include('header.php');
?>
<style>
    td>div
    {
        padding-top: 10px;
        padding-bottom: 10px;
    }
    a
    {
        text-decoration: none;
    }
</style>

<div class="container" style="padding-bottom: 15px; overflow-x:auto; height: 450px; width:100% !important;">
            <div class="row justify-content-md-center">
                <div class="col-md-12" style="padding-left: 65px; padding-right:65px; margin-top:10px;">
                    <div style="text-align: center; padding-top:7px; padding-bottom:2px; color:white;">
                        <h5>Composite Trials Team, Port Blair</h5>
                        <h6>Organisation Chart</h6>
                    </div>
                </div>
            </div>
            <br/>
            <div class="row justify-content-md-center">
                <div class="col col-md-2">                        
                    <a href="oic.php">
                        <table>
                            <tr>
                                <td>
                                    <center><img src="Assets/img/org_pics/oic.jpg" width="50%"/></center>
                                </td>
                            </tr>
                            <tr>
                                <td style="color: white !important; text-align: center;">
                                    <h6>CDR. S. C. WILLIAM<br/><label style="color: #b6c3ff;">Officer-in-Charge</label></h6>
                                </td>
                            </tr>
                        </table>
                    </a>
                </div>
            </div>
            <br/>
            <div class="row justify-content-md-center">
                <div class="col col-md-2">                        
                    <a href="doic.php">
                        <table>
                            <tr>
                                <td>
                                    <center><img src="Assets/img/org_pics/doic.jpg" width="50%"/></center>
                                </td>
                            </tr>
                            <tr>
                                <td style="color: white !important; text-align: center;">
                                <h6>LT CDR J GURUMURTHY<br/><label style="color: #b6c3ff;">Dy. Officer-in-Charge</label></h6>
                                </td>
                            </tr>
                        </table>
                    </a>
                </div>
            </div>
            <br/>
            <div class="row justify-content-md-center">
                <div class="col col-md-3">
                        <table style="width: 100%;" name="tborg">
                            <tr>
                                <td style="color: white !important; text-align: center;">
                                <div class="border rounded"><strong>ANJU YADAV MCEAP(P)-I<br/><label style="color: #b6c3ff;">Dept. Regulator</label></strong></div>
                                </td>
                            </tr>
                        </table>
                </div>
            </div>
            <br/>
            <div class="row justify-content-md-center">
                <div class="col col-md-12">
                    <table style="width: 100%;" name="tborg">
                        <tr>
                            <td style="color: white !important; text-align: center;" colspan="3">
                                <div class="border rounded"><strong>Trails Group</strong></div>
                            </td>
                            <td style="color: white !important; text-align: center;">
                                <div class="border rounded"><strong>Budget</strong></div>
                            </td>
                            <td style="color: white !important; text-align: center;">
                                <div class="border rounded"><strong>Admin</strong></div>
                            </td>
                            <td style="color: white !important; text-align: center;">
                                <div class="border rounded"><strong>IT & Returns</strong></div>
                            </td>
                            <td style="color: white !important; text-align: center;" colspan="2">
                                <div class="border rounded"><strong>Training & Test Eqpt</strong></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="color: white !important; text-align: center;">
                                <div class="border rounded"><strong>Refit</strong></div>
                            </td>
                            <td style="color: white !important; text-align: center;">
                                <div class="border rounded"><strong>OPS</strong></div>
                            </td>
                            <td style="color: white !important; text-align: center;">
                                <div class="border rounded"><strong>Audit</strong></div>
                            </td>
                            <td style="color: white !important; text-align: center;">
                            </td>
                            <td style="color: white !important; text-align: center;">
                            </td>
                            <td style="color: white !important; text-align: center;">
                            </td>
                            <td style="color: white !important; text-align: center;">
                                <div class="border rounded"><strong>OEM</strong></div>
                            </td>
                            <td style="color: white !important; text-align: center;">
                                <div class="border rounded"><strong>Unit</strong></div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

<?php
include('footer.php');
?>