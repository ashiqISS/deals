
<script type="text/javascript" src="<?= Yii::app()->baseUrl ?>/js/jquery.appear.js"></script>
<script type="text/javascript" src="<?= Yii::app()->baseUrl ?>/js/count-to.js"></script>
<script src="<?= Yii::app()->baseUrl ?>/js/classie.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery-1.11.3.min.js"></script>
<script src="<?= Yii::app()->baseUrl ?>/js/slick.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.11.3.min.js"></script>
<script>
<?php Yii::app()->clientscript->scriptMap['jquery.min.js'] = $jquery; ?>
<?php Yii::app()->clientscript->scriptMap['jquery.js'] = $jquery; ?>
<?php Yii::app()->clientscript->scriptMap['jquery.min.js'] = $jquery; ?>
<?php Yii::app()->clientscript->scriptMap['jquery.js'] = $jquery; ?>
</script>

<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/hover.css" rel="stylesheet" media="all">
<section class="title">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <h1>Address Book</h1>
                        </div>
                </div>
        </div>
</section>
<div class="container">
        <div class="row">
                <div class="col-xs-12">
                        <ul class="breadcrumb">
                                <li><a href="#"><i class="fa hom fa-home"></i></a></li>
                                <li><a href="#">Account</a></li>
                                <li><span class="last">Address Book</span></li>

                        </ul>
                </div>
        </div>
</div>


<section class="add">
        <div class="container">
                <div class="row">





                        <div class="col-md-3 col-xs-12 heading visible-xs visible-sm">

                                <div class="panel panel-default">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#m1"> <div class="panel-heading headz">

                                                        <span class="panel-title">
                                                                <i class="glyphicon gly glyphicon-plus"></i>Filter By Price
                                                        </span>


                                                </div>
                                        </a>
                                        <div id="m1" class="panel-collapse collapse">
                                                <div class="panel-body mbb">
                                                        <?php echo $this->renderPartial('_rightMenu'); ?>
                                                </div>
                                        </div>
                                </div>
                        </div>

                        <div class="col-lg-9 col-md-8 addressbook">

                                <div class="accountsettings">
                                        <?php if (!empty($model)) { ?>
                                                <?php foreach ($model as $address) { ?>
                                                        <div class="books">
                                                                <div class="book-1">
                                                                        <h1><?= $address->name ?></h1>
                                                                        <h1><?= $address->email ?></h1>
                                                                        <p><?= $address->address_line_1 ?></p>
                                                                </div>
                                                                <div class="book-2">
                                                                        <?php echo CHtml::link('Edit', array('Myaccount/EditAddressBook', 'id' => CHtml::encode($address->id)), array('class' => 'outs-1 hvr-radial-out')); ?>
                                                                        <a href="#" onclick="deleteaddress(<?php echo $address->id; ?>);" class="outs-2 hvr-radial-out">Delete</a>
                                                                </div>

                                                        </div>
                                                <?php } ?>

                                        <?php } else { ?>
                                                <?php echo 'No Address Found!!!!!' ?>
                                        <?php } ?>

                                </div>






                                <div class="btn-place-1">
                                        <a href="#" class="reward hvr-shutter-in-horizontal left-btns">Back</a>
                                </div>
                                <?php echo CHtml::link('New Address', array('Myaccount/NewAddressBook'), array('class' => 'newaddress-btn')); ?>
                        </div>

                        <div class="col-lg-3 col-md-4 mbb hidden-xs hidden-sm">
                                <?php echo $this->renderPartial('_rightMenu'); ?>
                        </div>
                </div>
        </div>
</section>


<script>

        function deleteaddress(adress_id)
        {
                var r = confirm("Are you sure you want to delete");
                if (r == true)
                {
                        $.ajax({
                                type: "GET",
                                url: baseurl + 'Myaccount/DeleteAddress',
                                data: ({adress_id: adress_id}),
                                success: function (data)
                                {
                                        window.location.replace("<?= Yii::app()->baseUrl; ?>/index.php/Myaccount/AddressBook");
                                }
                        });
                }
                else
                {
                        window.location.replace("<?= Yii::app()->baseUrl; ?>/index.php/Myaccount/AddressBook");
                }
        }
</script>