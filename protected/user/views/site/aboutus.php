
<section class="banner">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <img src="<?php echo Yii::app()->baseUrl ?>/uploads/pages/<?php echo $model->id; ?>/small.<?php echo $model->image; ?>">
                        </div>
                </div>
        </div>
</section>

<section class="india-aboutus">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <h1><?php echo $model->name; ?></h1>
                                <?php echo $model->large_description; ?>
                        </div>
                </div>

                <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4 sis">
                                <div class="counter-item">
                                        <div class="timer" id="item1" data-to="10000" data-speed="5000"></div>
                                        <div class="pluss"><i class="fa fa-plus"></i></div>
                                        <h5>Successful Vendors</h5>
                                </div>
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-4 sis">
                                <div class="counter-item">
                                        <div class="timer" id="item1" data-to="8000" data-speed="5000"></div>
                                        <div class="pluss"><i class="fa fa-plus"></i></div>
                                        <h5>Happy Clients</h5>
                                </div>
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-4 sis">
                                <div class="counter-item">
                                        <div class="timer" id="item1" data-to="10000" data-speed="5000"></div>
                                        <div class="pluss"><i class="fa fa-plus"></i></div>
                                        <h5>Successful Deals</h5>
                                </div>
                        </div>
                </div>
        </div>
</section>


<section class="india-team">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">

                                <h2>Our Team</h2>
                                <div class="teams">
                                        <?php
                                        foreach ($team as $teams) {
                                                ?>
                                                <div class="item">
                                                        <div class="main">
                                                                <div class="lak">
                                                                        <a href="#" tabindex="0"> <img class="img-responsive our" src="<?php echo Yii::app()->baseUrl ?>/uploads/team/<?php echo $teams->id; ?>/small.<?php echo $teams->image; ?>"></a>

                                                                        <div class="cart-img">
                                                                                <h3><?php echo $teams->name; ?></h3>
                                                                                <h3><?php echo $teams->designation; ?></h3>

                                                                        </div>

                                                                        <div class="overlays"></div>
                                                                        <div class="arrow-down"></div>
                                                                </div>
                                                        </div>
                                                </div>
                                                <?php
                                        }
                                        ?>

                                </div>
                        </div>
                </div>
        </div>
</section>

<script>
        $(document).ready(function() {
                $('.teams').slick({
                        slidesToShow: 4,
                        autoplay: true,
                        autoplaySpeed: 3000,
                        slidesToScroll: 1,
                        pauseOnHover: false,
                        responsive: [
                                {
                                        breakpoint: 1000,
                                        settings: {
                                                centerMode: false,
                                                slidesToShow: 2
                                        }
                                },
                                {
                                        breakpoint: 800,
                                        settings: {
                                                centerMode: false,
                                                slidesToShow: 2
                                        }
                                },
                                {
                                        breakpoint: 767,
                                        settings: {
                                                centerMode: false,
                                                slidesToShow: 1
                                        }
                                }
                        ]
                });

        });

</script>


<script type="text/javascript" src="js/jquery.appear.js"></script>
<script type="text/javascript" src="js/count-to.js"></script>

<script>

        $('.timer').countTo();

        $('.counter-item').appear(function() {
                $('.timer').countTo();
        }, {accY: -100});

</script>


