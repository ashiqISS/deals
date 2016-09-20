
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


