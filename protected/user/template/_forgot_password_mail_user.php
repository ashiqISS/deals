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
                                        <td><a href="http://dealsonindia.com"><img src="<?php echo $this->siteURL(); ?>/images/logo.png" width="776" height="102" alt=""></a></td>
                                </tr>
                                <tr>
                                        <td style="padding:40px 20px; font-family:'Open Sans',arial, sans-serif; font-size:13px"><p style="font-size:14px; font-weight:bold;">Reset Your Password</p>
                                                <p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;">Dear <b><?php echo $details->first_name; ?></b>,</p>
                                                <p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;">You recently requested to reset your password for your dealsonindia  Account.Click the button below to reset it.</p>
                                                <p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;"><button style="display: table;margin: 0 auto;background: #0e6382;padding: 10px;padding-left:20px;padding-right:20px;margin-bottom:20px;border: 0px solid #1C1B1C;border-radius: 3px 3px 3px 3px;">

                                                                <a href="<?php echo $this->siteURL(); ?>/index.php/ForgotPassword/Changepassword?token=<?php echo $token; ?>" style="text-decoration:none;color:#fff;font-weight: bold;font-size: 15px;">Reset Password</a>
                                                        </button></p>
                                                <p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;">If you did not request a password reset, please ignore this email or reply to let us know. This password reset is only valid for the next 24 hours.</p>
                                                <p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;">Thanks,</p>
                                                <p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;font-weight:bold;">dealsonindia</p>

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