
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
                    <td><a href="http://dealsonindia.com"><img src="<?php echo $this->siteURL(); ?>/images/admin-logo.png" width="776" height="102" alt=""></a></td>
                </tr>
                <tr>
                    <td>
                        <div style="padding: 2em">
                            <br>
                            Hi Admin<br><br>
                            <?php $user = BuyerDetails::model()->findByPk($model->user_id); ?>
                            The Order Details of <?php echo $user->first_name . ' ' . $user->last_name ?>, with Order Id : <?php echo $model->id ?> and Total Amount of : Rs:<?php echo $model->total_amount ?>

                            <table  border="1">
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Amount</th>
                                </tr>
                                <tr>
                                    <?php
                                    $details = OrderProducts::model()->findAllByAttributes(array('order_id' => $model->id));
                                    foreach ($details as $detail) {
                                            $product = Products::model()->findByPk($detail->product_id);
                                            ?>
                                            <td><?php echo $product->product_name ?></td>
                                            <td><?php echo $detail->quantity ?></td>
                                            <td><?php echo $detail->amount ?></td>
                                    <?php } ?>
                                </tr>
                            </table>


                        </div>
                    </td>
                </tr>

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