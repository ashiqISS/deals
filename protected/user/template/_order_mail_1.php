
<html>
        <head>
                <title>emailer</title>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        </head>
        <body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
                <!-- Save for Web Slices (emailer.psd) -->
                <div style="margin:auto; width:776px; border:solid 2px #404241; margin-top:40px; margin-bottom:40px;">
                        <table id="Table_01" width="776" border="0" cellpadding="0" cellspacing="0" align="center">
                                <tr>
                                        <td><a href="http://dealsonindia.com"><img src="<?php echo $this->siteURL(); ?>/images/emailer_logo.jpg" width="776" height="102" alt=""></a></td>
                                </tr>

                                <tr>
                                        <td valign="top">
                                                <h1 style="font-size:22px;font-weight:normal;line-height:22px;margin:13px 0 12px 9px;text-align:left;">Hello, <?php echo $userdetails->first_name; ?>   <?php echo $userdetails->last_name; ?>
                                                        <span style="float: right;font-size: 13px;padding: 10px;font-weight: bold; padding-top: 0px;">Order ID #<?php echo $model->id; ?></span>
                                                </h1>
                                                <p style="font-size:13px;line-height:16px;margin: 0px 12px 8px 9px;text-align:left;">
                                                        Order Confirmation - Your Order with DealsonIndia [<?php echo $order->id; ?><small>(placed on <?php
                                                                echo
                                                                date("F d , Y", strtotime($model->order_date));
                                                                ?>)</small>] has been successfully placed!
                                                </p>
                                        </td>
                                </tr>
                                <tr>
                                        <td>
                                                <table cellspacing="0" cellpadding="0" border="0" width="776" style="    font-family: 'Open Sans',arial, sans-serif;font-size: 13px;">
                                                        <thead>
                                                                <tr>
                                                                        <th align="left" width="325" bgcolor="#EAEAEA" style="    font-family: 'Open Sans',arial, sans-serif;font-size:13px;padding:5px 9px 6px 9px;line-height:1em">Billing Information:</th>
                                                                        <th width="10"></th>
                                                                        <th align="left" width="325" bgcolor="#EAEAEA" style="font-family:'Open Sans',arial, sans-serif;font-size:13px;padding:5px 9px 6px 9px;line-height:1em">Payment Method:</th>
                                                                </tr>
                                                        </thead>
                                                        <tbody>
                                                                <tr>
                                                                        <td valign="top" style="font-size:13px;padding:7px 9px 9px 9px;border-left:1px solid #eaeaea;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea">
                                                                                <?php echo $bill_address->name; ?>  <br>

                                                                                <?php echo $bill_address->address_line_1; ?> <br>
                                                                                <?php echo $bill_address->pincode; ?><br>


                                                                                <?php echo $bill_address->state; ?><br>

                                                                                <?php
//                                        echo $shiping_charge->country;
                                                                                ?>



                                                                        </td>
                                                                        <td>&nbsp;</td>
                                                                        <td valign="top" style="font-family: 'Open Sans',arial, sans-serif;font-size:12px;padding:7px 9px 9px 9px;border-left:1px solid #eaeaea;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea">
                                                                                <p style="text-transform: uppercase;font-weight: bold;padding-top:20px;">pay via <?php
                                                                                        if ($model->payment_mode == 1) {
                                                                                                echo "Credit Amount";
                                                                                        } elseif ($model->payment_mode == 2) {
                                                                                                echo "CREDIT/DEBIT CARD OR NET BANKING";
                                                                                        } elseif ($model->payment_mode == 3) {
                                                                                                echo "Paypal";
                                                                                        } elseif ($model->payment_mode == 4) {
                                                                                                $wallet_amt = $model->wallet;
                                                                                                if ($model->netbanking != '') {
                                                                                                        $payment_amt = $model->netbanking;
                                                                                                        $method = 'CREDIT/DEBIT CARD OR NET BANKING';
                                                                                                } else if ($model->paypal != '') {
                                                                                                        $payment_amt = $model->paypal;
                                                                                                        $method = 'Paypal';
                                                                                                }
                                                                                                echo "<br>Credit Amount = " . $wallet_amt;
                                                                                                echo "<br>" . $method . " = " . $payment_amt;
                                                                                        }
                                                                                        ?></p>



                                                                        </td>
                                                                </tr>
                                                        </tbody>
                                                </table>
                                                <br>

                                                <table cellspacing="0" cellpadding="0" border="0" width="776" style="    font-family: 'Open Sans',arial, sans-serif;font-size: 13px;">
                                                        <thead>
                                                                <tr>
                                                                        <th align="left" width="364" bgcolor="#EAEAEA" style="font-family:'Open Sans',arial, sans-serif;font-size:13px;padding:5px 9px 6px 9px;line-height:1em">Shipping Information:</th>
                                                                        <th width="10"></th>
                                                                        <th align="left" width="364" bgcolor="#EAEAEA" style="font-family:'Open Sans',arial, sans-serif;font-size:13px;padding:5px 9px 6px 9px;line-height:1em">Shipping Rate:</th>
                                                                </tr>
                                                        </thead>
                                                        <tbody>
                                                                <tr>
                                                                        <td valign="top" style="font-size:13px;padding:7px 9px 9px 9px;border-left:1px solid #eaeaea;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea">
                                                                                <?php echo $user_address->name; ?><br>

                                                                                <?php echo $user_address->address_line_1; ?> <br>
                                                                                <?php echo $user_address->pincode; ?><br>


                                                                                <?php echo $user_address->state; ?> <br>



                                                                                &nbsp;
                                                                        </td>
                                                                        <td>&nbsp;</td>
                                                                        <td valign="top" style="font-size:13px;padding:7px 9px 9px 9px;border-left:1px solid #eaeaea;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea">
                                                                                <?php
                                                                                if ($shiping_charge->shipping_rate == 0 || $shiping_charge->shipping_rate = '') {
                                                                                        echo " Free Shipping";
                                                                                } else {
                                                                                        ?>
                                                                                        Shipping Rate:<?php
                                                                                        echo Yii::app()->Currency->convertCurrencyCode($shiping_charge->shipping_rate);
                                                                                }
                                                                                ?> ( delivered within 3-14 working days )
                                                                                &nbsp;
                                                                        </td>
                                                                </tr>
                                                        </tbody>
                                                </table>
                                                <br>
                                                <table cellspacing="0" cellpadding="0" border="0" width="776" style="border:1px solid #eaeaea;font-family: 'Open Sans',arial, sans-serif;">
                                                        <thead>
                                                                <tr>
                                                                        <th align="left" bgcolor="#EAEAEA" style="font-size:13px;padding:3px 9px">Item</th>
                                                                        <th align="left" bgcolor="#EAEAEA" style="font-size:13px;padding:3px 9px">Code</th>
                                                                        <th align="center" bgcolor="#EAEAEA" style="font-size:13px;padding:3px 9px">Qty</th>
                                                                        <th align="right" bgcolor="#EAEAEA" style="font-size:13px;padding:3px 9px">Subtotal</th>
                                                                </tr>
                                                        </thead>

                                                        <tbody bgcolor="#F6F6F6">
                                                                <?php
                                                                foreach ($order_details as $orders) {
                                                                        $product_names = Products::model()->findByAttributes(array('id' => $orders->product_id));
                                                                        ?>
                                                                        <tr>
                                                                                <td align="left" valign="top" style="font-size:11px;padding:3px 9px;padding-top:10px; padding-bottom:10px;border-bottom:1px dotted #cccccc;">
                                                                                        <strong style="font-size:11px;text-transform: uppercase;"><?php echo $product_names->product_name; ?></strong>

                                                                                </td>
                                                                                <td align="left" valign="top" style="font-size:11px;padding:3px 9px;padding-top:10px;"><?php echo $product_names->product_code; ?></td>
                                                                                <td align="center" valign="top" style="font-size:11px;padding:3px 9px;padding-top:10px;"><?php echo $orders->quantity; ?></td>
                                                                                <td align="right" valign="top" style="font-size:11px;padding:3px 9px;padding-top:10px;">


                                                                                        <span><?php echo $orders->amount; ?> AED</span>                                        </td>
                                                                        </tr>

                                                                        <?php
                                                                }
                                                                ?>
                                                                <tr>
                                                                        <?php
                                                                        foreach ($order_details as $total_order) {
                                                                                $totorder += $total_order->amount;
                                                                        }

                                                                        foreach ($order_details as $giftoption) {
                                                                                $totgift += $giftoption->rate;
                                                                        }
                                                                        $granttotal = $totgift + $totorder;
                                                                        $total = $granttotal + 2.00;
                                                                        ?>
                                                                        <td colspan="3" align="right" style="padding:13px 9px 0 0;font-size:13px;">
                                                                                Subtotal                    </td>
                                                                        <td align="right" style="padding:13px 9px 0 0;font-size:13px;">
                                                                                <span><?php echo $granttotal; ?> AED</span>                    </td>
                                                                </tr>
                                                                <tr>
                                                                        <td colspan="3" align="right" style="padding:3px 9px;font-size:13px;">
                                                                                Shipping &amp; Handling                    </td>
                                                                        <td align="right" style="padding:3px 9px;font-size:13px;">
                                                                                <span><?php echo 2.00; ?> AED</span>                    </td>
                                                                </tr>
                                                                <tr>
                                                                        <td colspan="3" align="right" style="padding:3px 9px 13px 0;font-size:13px;">
                                                                                <strong>Grand Total</strong>
                                                                        </td>
                                                                        <td align="right" style="padding:3px 9px 13px 0;font-size:13px;">
                                                                                <strong><span><?php echo $total; ?> AED</span></strong>
                                                                        </td>
                                                                </tr>
                                                        </tbody>
                                                </table>

                                                <br>
                                                <p style="font-size:12px;margin:0 0 10px 0"></p>
                                        </td>
                                </tr>
                                <!--                            Thanks & Regards<br>
                                                            Dealsonindia Team-->
                                <tr>
                                        <td style="padding:20px;  border:solid 1px #d7d7d7;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                                <tr>
                                                                        <td align="center">
                                                                                <h4 style=" font-family:'Open Sans',arial, sans-serif; font-size:16px; color:#414042; margin-bottom:10px;"></h4>
                                                                                <p style="font-family:'Open Sans',arial, sans-serif; font-size:13px;">dealsonindia<br>Tel:  +90 123 45 67, +90 123 45 68 <br>
                                                                                        <a href="mailto:intersmarthosting.in" style="border:none; color:#414042;">info@dealsonindia.com</a> <br>
                                                                                        Copyright © 2016. All rights reserved.</p></td>
                                                                </tr>
                                                        </tbody>
                                                </table></td>
                                </tr>
                        </table></div>
                <!-- End Save for Web Slices -->
        </body>
</html>