<?php echo $this->renderPartial('_breadcremb'); ?>
<section class="checkout">
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
                                        <!--                    <div id="m1" class="panel-collapse collapse fdggfdg">
                                                                <div class="panel-body mbb">
                                                                    <ul>
                                                                        <li><a href="#">My profile</a></li>
                                                                        <li><a href="#">Message </a></li>
                                                                        <li><a href="#">Account settings</a></li>
                                                                        <li><a href="#">Order History</a></li>
                                                                        <li><a href="#">Address Book</a></li>
                                                                        <li class="active"><a href="#">Newsletter Subscription</a></li>

                                                                        <li><a href="#">Set interest deals/ wish listed deals</a></li>
                                                                        <li><a href="#"> Submit a deal/ product </a></li>
                                                                        <li><a href="#"> My product</a></li>
                                                                        <li><a href="#">My sales Report </a></li>
                                                                        <li><a href="#"> Transaction</a></li>
                                                                        <li><a href="#"> Payment/Payout</a></li>
                                                                        <li><a href="#"> Plan details</a></li>
                                                                        <li><a href="#"> Affiliate commission</a></li>
                                                                        <li><a href="#"> Reward points</a></li>

                                                                        <li><a href="#"> Discount coupon generation</a></li>
                                                                        <li><a href="#">Used and refurbished (Return products)</a></li>
                                                                        <li><a href="#"> Paid Ad</a></li>
                                                                        <li><a href="#"> Bargain zone</a></li>
                                                                    </ul>

                                                                </div>
                                                            </div>-->
                                </div>
                        </div>

                        <div class="col-lg-9 col-md-8">
                                <div class="accountsettings">
                                        <div class="row">
                                                <div class="col-md-6" >
                                                </div>
                                                <div class="col-md-3" style="text-align: right;float: right;padding-right: 2em;">
                                                        <a class="edit-btn" href="<?php echo Yii::app()->request->baseUrl . '/index.php/Myaccount/CreateBankDetails'; ?>"> Add New Account</a>
                                                </div>
                                        </div>
                                        <?php if (Yii::app()->user->hasFlash('banksuccess')): ?>
                                                <div class="alert alert-success">
                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                        <strong>Success!</strong>     <?php echo Yii::app()->user->getFlash('banksuccess'); ?>
                                                </div>

                                        <?php endif; ?>
                                        <?php
                                        if (empty($datas)) {
                                                ?>
                                                <h4 class="fournotfour" style="padding: 2em;">You haven't added any accounts !</h4>
                                                <?php
                                        } else {
                                                ?>
                                                <div class="copyz">
                                                        <div><center><hr/></center></div>
                                                </div>
                                                <?php
                                                foreach ($datas as $data) {
                                                        if ($data->account_type == 1) {
                                                                ?>

                                                                <div class="copyz">
                                                                        <div class="col-sm-3 col-xs-3 zeros">
                                                                                <label for="textinput" class="control-labelz">PayPal Id</label>
                                                                        </div>
                                                                        <div class="col-sm-1 col-xs-1 zeros">
                                                                                <label for="textinput" class="control-labelz">:</label>
                                                                        </div>
                                                                        <div class="col-sm-8 col-xs-8 zeros">
                                                                                <label for="textinput" class="control-labelz-2"><?php echo $data->paypal_id; ?></label>
                                                                        </div>
                                                                </div>
                                                                <div class="copyz">
                                                                        <div class="col-sm-3 col-xs-3 zeros">
                                                                                <label for="textinput" class="control-labelz">PayPal email</label>
                                                                        </div>
                                                                        <div class="col-sm-1 col-xs-1 zeros">
                                                                                <label for="textinput" class="control-labelz">:</label>
                                                                        </div>
                                                                        <div class="col-sm-8 col-xs-8 zeros">
                                                                                <label for="textinput" class="control-labelz-2"><?php echo $data->email; ?></label>
                                                                        </div>
                                                                </div>
                                                                <div class="copyz">
                                                                        <div><center><hr/></center></div>
                                                                </div>
                                                        <?php } else {
                                                                ?>

                                                                <div class="copyz">
                                                                        <div class="col-sm-3 col-xs-3 zeros">
                                                                                <label for="textinput" class="control-labelz">Bank Name</label>
                                                                        </div>
                                                                        <div class="col-sm-1 col-xs-1 zeros">
                                                                                <label for="textinput" class="control-labelz">:</label>
                                                                        </div>
                                                                        <div class="col-sm-8 col-xs-8 zeros">
                                                                                <label for="textinput" class="control-labelz-2"><?php echo $data->bank_name; ?></label>
                                                                        </div>
                                                                </div>

                                                                <div class="copyz">
                                                                        <div class="col-sm-3 col-xs-3 zeros">
                                                                                <label for="textinput" class="control-labelz">Account number</label>
                                                                        </div>
                                                                        <div class="col-sm-1 col-xs-1 zeros">
                                                                                <label for="textinput" class="control-labelz">:</label>
                                                                        </div>
                                                                        <div class="col-sm-8 col-xs-8 zeros">
                                                                                <label for="textinput" class="control-labelz-2"><?php echo $data->account_number; ?></label>
                                                                        </div>
                                                                </div>
                                                                <div class="copyz">
                                                                        <div class="col-sm-3 col-xs-3 zeros">
                                                                                <label for="textinput" class="control-labelz">Account Holder Name</label>
                                                                        </div>
                                                                        <div class="col-sm-1 col-xs-1 zeros">
                                                                                <label for="textinput" class="control-labelz">:</label>
                                                                        </div>
                                                                        <div class="col-sm-8 col-xs-8 zeros">
                                                                                <label for="textinput" class="control-labelz-2"><?php echo $data->account_holder_name; ?></label>
                                                                        </div>
                                                                </div>

                                                                <div class="copyz">
                                                                        <div class="col-sm-3 col-xs-3 zeros">
                                                                                <label for="textinput" class="control-labelz">IFSC</label>
                                                                        </div>
                                                                        <div class="col-sm-1 col-xs-1 zeros">
                                                                                <label for="textinput" class="control-labelz">:</label>
                                                                        </div>
                                                                        <div class="col-sm-8 col-xs-8 zeros">
                                                                                <label for="textinput" class="control-labelz-2"><?php echo $data->ifsc; ?></label>
                                                                        </div>
                                                                </div>
                                                                <div class="copyz">
                                                                        <div><center><hr/></center></div>
                                                                </div>

                                                                <?php
                                                        }
                                                }
                                        }
                                        ?>



                                </div>
                        </div>

                        <div class="col-lg-3 col-md-4 mbb hidden-xs hidden-sm">
                                <?php echo $this->renderPartial('_rightMenu'); ?>
                        </div>
                </div>
        </div>
</section>