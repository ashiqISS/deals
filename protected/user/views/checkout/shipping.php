<section class="title">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <h1>Checkout</h1>
                        </div>
                </div>
        </div>
</section>
<style>
        .checkbox label, .radio label {
                min-height: 20px;
                padding-left: 0px;
        }
</style>
<script src="<?= Yii::app()->baseUrl ?>/js/jquery-1.11.3.min.js"></script>
<script src="<?= Yii::app()->baseUrl ?>/js/bootstrap.min.js"></script>

<?php echo $this->renderPartial('_breadcremb'); ?>
<?php if ($email_vari != 1) { ?>
        <script>
                $(document).ready(function () {
                        $('#email_vari_checking').modal('show');
                });

        </script>
<?php } ?>
<div class="modal fade" id="email_vari_checking" role="dialog">
        <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><img class="tick" src="<?php echo yii::app()->request->baseUrl; ?>/images/wrong.png">Email Verification Required</h4>
                        </div>
                        <div class="modal-body">
                                <p> Please verify your email to continue checkout . Check Your spam folder also </p>
                        </div>

                </div>

        </div>
</div>
<section class="checkout">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <div class="accountsettings">
                                        <div class="col-md-12">
                                                <div class="ch_box"> <h1>Shipping Address</h1>
                                                        <?php if (isset(Yii::app()->session['user'])) { ?>
                                                                <?php if (Yii::app()->session['user']['shipping_same'] == 1) { ?>
                                                                        <style>
                                                                                .new_address {
                                                                                        display: none;
                                                                                }
                                                                        </style>
                                                                <?php } else { ?>
                                                                        <style>
                                                                                .new_address {
                                                                                        display: block;
                                                                                }
                                                                        </style>
                                                                <?php } ?>

                                                                <?php
                                                                $form = $this->beginWidget('CActiveForm', array(
                                                                    'id' => 'buyer-details-checkout-form',
                                                                    'enableClientValidation' => true,
                                                                    'clientOptions' => array(
                                                                        'validateOnSubmit' => false,
                                                                    ),
                                                                    // Please note: When you enable ajax validation, make sure the corresponding
                                                                    // controller action is handling ajax validation correctly.
                                                                    // See class documentation of CActiveForm for details on this,
                                                                    // you need to use the performAjaxValidation()-method described there.
                                                                    'enableAjaxValidation' => true,
                                                                ));
                                                                ?>
                                                                <div class="ui-set">
                                                                        <div class="checkbox txt">
                                                                                <label><input type="radio" name="check_address" checked="" value="1" class="chb same_add" /> I want to choose from existing Address</label>
                                                                        </div>



                                                                </div>
                                                                <div class="ext_address">
                                                                        <div class="ui-set ">
                                                                                <div class="form-group">
                                                                                        <?php $useraddress = AddressBook::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id'])); ?>
                                                                                        <?php $order_details = Order::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id'], 'session_id' => Yii::app()->session['temp_user'])); ?>
                                                                                        <select  name="ship_address" class="select_ship_exist form-control">
                                                                                                <!--<option  value="0">New Address</option>-->
                                                                                                <?php
                                                                                                foreach ($useraddress as $useradd) {
                                                                                                        ?>
                                                                                                        <option <?php
                                                                                                        if ($order_details->bill_address_id == $useradd->id) {
                                                                                                                echo "selected";
                                                                                                        }
                                                                                                        ?>  value="<?php echo $useradd->id; ?>"><?php echo $useradd->name; ?> ,   <?php echo $useradd->address_line_1; ?>
                                                                                                                <?php echo $useradd->address_line_2; ?> , <?php echo $useradd->city; ?> ,
                                                                                                                <?php echo $useradd->state; ?> <?php echo MasterState::model()->findByPk($useradd->state)->state; ?> , <?php echo MasterCountry::model()->findByPk($useradd->country)->country; ?>
                                                                                                                <?php echo $useradd->pincode; ?></option>
                                                                                                        <?php
                                                                                                        if (isset($_GET['box'])) {
                                                                                                                echo "Success!";
                                                                                                        }
                                                                                                }
                                                                                                ?>
                                                                                        </select>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="ui-set">
                                                                        <div class="checkbox txt">
                                                                                <label><input type="radio" name="check_address" value="2" class="chb diff_add" /> I want to use a different Shipping Address </label>
                                                                        </div>
                                                                        <div class="sp_pdg"> &nbsp;</div>

                                                                </div>
                                                                <div class="new_address">
                                                                        <h1>New Shipping  Details</h1>
                                                                        <?php echo $form->errorSummary($address); ?>
                                                                        <div class="ui-set">
                                                                                <div class="form-group">
                                                                                        <?php echo $form->textField($address, 'name', array('class' => 'form-set', 'placeholder' => 'Name')); ?>
                                                                                        <?php echo $form->error($address, 'name', array('class' => 'red')); ?>

                                                                                </div>
                                                                        </div>
                                                                        <div class="ui-set">
                                                                                <div class="form-group">
                                                                                        <?php echo $form->textArea($address, 'address_line_1', array('class' => 'form-set', 'placeholder' => 'Address Line 1')); ?>
                                                                                        <?php echo $form->error($address, 'address_line_1', array('class' => 'red')); ?>

                                                                                </div>
                                                                        </div>

                                                                        <div class="ui-set">
                                                                                <div class="form-group">
                                                                                        <?php echo $form->textArea($address, 'address_line_2', array('class' => 'form-set', 'placeholder' => 'Address Line 2')); ?>
                                                                                        <?php echo $form->error($address, 'address_line_2', array('class' => 'red')); ?>
                                                                                </div>
                                                                        </div>
                                                                        <div class="ui-set">
                                                                                <div class="form-group">
                                                                                        <?php echo CHtml::activeDropDownList($address, 'country', CHtml::listData(MasterCountry::model()->findAllByAttributes(array('status' => 1)), 'id', 'country'), array('empty' => '--Select Country--', 'class' => 'form-select2', 'options' => array(99 => array('selected' => 'selected')))); ?>
                                                                                        <?php echo $form->error($address, 'country', array('class' => 'red')); ?>
                                                                                </div>
                                                                        </div>
                                                                        <div class="ui-set">
                                                                                <div class="form-group">
                                                                                        <?php echo CHtml::activeDropDownList($address, 'state', CHtml::listData(MasterState::model()->findAllByAttributes(array('status' => 1)), 'Id', 'state'), array('empty' => '--Select State--', 'class' => 'form-select2', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                                                                        <?php echo $form->error($address, 'state', array('class' => 'red')); ?>
                                                                                </div>
                                                                        </div>
                                                                        <div class="ui-set">
                                                                                <div class="form-group">
                                                                                        <?php echo $form->textField($address, 'city', array('class' => 'form-set', 'placeholder' => 'City')); ?>
                                                                                        <?php echo $form->error($address, 'city', array('class' => 'red')); ?>
                                                                                </div>
                                                                        </div>
                                                                        <div class="ui-set">
                                                                                <div class="form-group">
                                                                                        <?php echo $form->textField($address, 'pincode', array('class' => 'form-set', 'placeholder' => 'Pin Code')); ?>
                                                                                        <?php echo $form->error($address, 'pincode', array('class' => 'red')); ?>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                        <?php echo $form->dropDownList($address, 'default_billing_address', array('' => "Default Address", '1' => "Yes", '0' => "No"), array('class' => 'form-select2')); ?>
                                                                                        <?php echo $form->error($address, 'default_billing_address'); ?>
                                                                                </div>
                                                                        </div>

                                                                </div>
                                                                <div class="col-md-6"></div>
                                                                <div class="col-md-6">

                                                                        <div class="btn_upcmg">


                                                                                <div class="btn-place-1">

                                                                                        &nbsp;

                                                                                </div>


                                                                                <div class="btn-place-2">
                                                                                        <button type="submit" class="ripple btn log-btn btn-default">Continue</button>
                                                                                        <!--<a href="#" class="reward hvr-shutter-in-horizontal3 right-btn">Continue</a>-->
                                                                                </div>

                                                                        </div>


                                                                </div>

                                                                <?php $this->endWidget(); ?>
                                                        <?php } ?>

                                                        <div style="clear:both"></div></div>

                                        </div>

                                </div>
                        </div>
                </div>
        </div>
</section>

<script>
<?php if (Yii::app()->session['user']['shipping_same'] == 1) { ?>
                $(".same_add").prop('checked', true);
                $(".diff_add").prop('checked', false);


<?php } else { ?>
                $(".same_add").prop('checked', false);
                $(".diff_add").prop('checked', true);
<?php } ?>
        if ($('.same_add').is(':checked')) {
                $(".new_address").hide();
                $(".ext_address").show();
        } else {
                $(".ext_address").hide();
                $(".new_address").show();

        }
        $(document).ready(function () {
                $(".same_add").click(function () {
                        $(".new_address").hide();
                        $(".ext_address").show();

                });
                $(".diff_add").click(function () {
                        $(".ext_address").hide();
                        $(".new_address").show();


                });
        });
</script>