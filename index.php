<?php
    error_reporting(0);
    $header_text = "CTT";
    include('header.php');
    include('ctt/conn.php');
?>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-pause="false">
                <div class="carousel-inner">


                        <?php
                            $sqlp = mysqli_query($db,"select * from home_page");   
                            if($sqlp) 
                            {
                                $i = 1;
                                while($homeslider = mysqli_fetch_assoc($sqlp))
                                {
                        ?>


                        <div class="carousel-item active" data-bs-interval="3000">
                        <?php echo "<img src='Assets/img/Slider/".$homeslider['home_image']."' class='d-block w-100' alt=''>";?>
                        <div class="carousel-caption d-none d-md-block">
                            <h5></h5>
                            <p></p>
                        </div>
                        </div>

                        <?php
                                    $i++;
                                }
                            }
                        ?>

                </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 border border-top-0 rounded-bottom" style="padding-left: 0px; padding-right:0px;">
                    <div style="background-color: #000080; text-align: center; padding-top:7px; padding-bottom:2px; color:white;"><h5>Unit Brief</h5></div>
                    <div style="padding:10px;"><p style="text-align: justify; color: white;">Composite Trials Team, Port Blair was established on 07 Sep 2006 and during the past 16 years the unit has developed into a credible and self-reliant organisation providing technical guidance to units under Andaman and Nicobar Command. The activities of the unit are primarily governed by Navy Order 19/99, 88/02 & 14/15 which includes charter of duties of MTU, DTTT & ETMU respectively for conduct of performance evaluation trials of all engineering and electrical machineries. <a href="unitbrief.php">Read more...</a></p></div>
                </div>
                <!--<div class="col-md-3 border border-top-0 rounded-bottom" style="padding-right: 0px;padding-left: 0px;">
                <div style="background-color: #000080; text-align: center; padding-top:7px; padding-bottom:2px; color:white;"><h5>Upcoming Events</h5></div>
                </div>-->
            </div>
        </div>





<?php
include('footer.php');
?>