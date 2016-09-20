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
                                        <td style="padding:40px 20px; font-family:'Open Sans',arial, sans-serif; font-size:13px"><p>Hi Admin,</p>
                                                <table id="Table_01"  border="0" cellpadding="0" cellspacing="0" align="left" style="padding:13px 0px; font-family:'Open Sans',arial, sans-serif; font-size:13px">
                                                        <tr>
                                                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;">Customer Name</p></td>
                                                                <td>:</td>
                                                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;"><?php echo $model->name; ?></p></td>
                                                        </tr>
                                                        <tr>
                                                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;">Email ID</p></td>
                                                                <td>:</td>
                                                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;">#<?php echo $model->email; ?></p></td>
                                                        </tr>
                                                        <tr>
                                                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;">Phone Number</p></td>
                                                                <td>:</td>
                                                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;"><?php echo $model->phone; ?></p></td>
                                                        </tr>
                                                        <tr>
                                                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;">Message</p></td>
                                                                <td>:</td>
                                                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;"><?php echo $model->comment; ?></p></td>
                                                        </tr>
                                                        <tr>
                                                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;">Date</p></td>
                                                                <td>:</td>
                                                                <td><p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;padding:10px;"><?php echo $model->date ?></p>
                                                                </td>
                                                        </tr>




                                                </table>


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


