<?php
    error_reporting(0);
    $header_text = "CTT";
    include('header.php');
    include('admin/conn.php');
?>


                        <?php
                            $sqlp = mysqli_query($db,"select * from home_page");   
                            if($sqlp) 
                            {
                                $i = 1;
                                while($homeslider = mysqli_fetch_assoc($sqlp))
                                {
                        ?>
                        <tr class="small">
                            <td><?php echo $i;?></td>
                            <td><?php echo "<img src='../Assets/img/Slider/".$homeslider['home_image']."' style='width:300px !important; height:100px !important; border-radius: 5%;'>";?></td>
                            <td class="">
                                <div class="btn-group" role="group">
                                    <form method="post" action="">
                                        <input type="hidden" value="<?php echo $homeslider['id'];?>" name="delpid">
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




        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-pause="false">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="3000">
                    <img src="Assets/img/Slider/110.jpg" class="d-block w-100" alt="">
                    <div class="carousel-caption d-none d-md-block">
                        <h5></h5>
                        <p></p>
                    </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                    <img src="Assets/img/Slider/111.jpg" class="d-block w-100" alt="">
                    <div class="carousel-caption d-none d-md-block">
                        <h5></h5>
                        <p></p>
                    </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                    <img src="Assets/img/Slider/112.jpg" class="d-block w-100" alt="">
                    <div class="carousel-caption d-none d-md-block">
                        <h5></h5>
                        <p></p>
                    </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#image-slider" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#image-slider" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
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