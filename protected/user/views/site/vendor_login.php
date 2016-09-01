<section class="banner">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <img src="<?= Yii::app()->baseUrl ?>/images/c1.jpg">
                        </div>
                </div>
        </div>
</section>
<section class="contact-form-wrp">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <h1>Login</h1>
                                <div class="contact-form contact-forms">
                                        <div class="common ">
                                                <div class="col-sm-3 col-xs-3 zeros">
                                                        <label for="textinput" class="control-labele">Login Type</label>
                                                </div>
                                                <div class="col-sm-1 col-xs-1 zeros">
                                                        <label for="textinput" class="control-labele">:</label>
                                                </div>
                                                <div class="col-sm-8 col-xs-8 zeros login_common">
                                                        <label class="radio-inline sec">
                                                                <input id="user" type="radio" name="user" value="1">User
                                                        </label>
                                                        <label class="radio-inline sec">
                                                                <input id="merchant" type="radio" name="user" value="2">Merchant
                                                        </label>
                                                </div>
                                        </div>
                                        <div class="form" id="user_login">

                                                <?php
                                                $form = $this->beginWidget('CActiveForm', array(
                                                    'id' => 'buyer-details-form',
                                                    'enableAjaxValidation' => false,
                                                ));
                                                ?>


                                                <div class="row">
                                                        <div class="col-xs-12 col-sm-12">
                                                                <span class="field-span input input--ruri">
                                                                        <?php echo $form->labelEx($model, 'email', array('class' => 'label-field label-field-ruri input__label input__label--ruri')); ?>
                                                                        &nbsp;&nbsp;&nbsp;
                                                                        <?php echo $form->textField($model, 'email'); ?>
                                                                        <?php echo $form->error($model, 'email'); ?>
                                                                </span>
                                                        </div>
                                                </div>
                                                <tr>
                                                        <td><?php echo $form->labelEx($model, 'password'); ?></td>
                                                        <td> &nbsp;&nbsp;&nbsp;</td>
                                                        <td>
                                                                <?php echo $form->textField($model, 'password'); ?>
                                                                <?php echo $form->error($model, 'password'); ?>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td><?php echo $form->labelEx($model, 'rememberMe'); ?></td>
                                                        <td> &nbsp;&nbsp;&nbsp;</td>
                                                        <td>
                                                                <?php echo $form->checkBox($model, 'rememberMe'); ?>
                                                                <?php echo $form->error($model, 'rememberMe'); ?>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td colspan="3">
                                                                <div class="row buttons">
                                                                        <?php echo CHtml::submitButton('Submit'); ?>
                                                                </div>

                                                        </td>
                                                </tr>
                                                </table>



                                                <?php $this->endWidget(); ?>

                                        </div><!-- form -->

                                </div>
                        </div>
                </div>
        </div>
</section>


<script type="text/javascript">
        $('.login_common').on('click', function () {
                alert();
                $('.merchant_login_id').hide();
        });
</script>