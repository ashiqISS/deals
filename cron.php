<?php

$user = "root";
$password = "mysql";
$database = "dealsonindia";
mysql_connect(localhost, $user, $password);
@mysql_select_db($database) or die("Unable to select database");

date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');

$queryProducts = "SELECT * FROM `products` WHERE status = 1 AND is_admin_approved = 1 AND  product_type = 4 AND special_price_from <= '" . $date . "' AND special_price_to =  '" . $date . "'";
$resultProducts = mysql_query($queryProducts);

while ($rowProducts = mysql_fetch_array($resultProducts, MYSQL_ASSOC)) {

    $existsQuery = mysql_query("SELECT * FROM `bargain_details` WHERE `product_id` = " . $rowProducts['id']);
    if (mysql_num_rows($existsQuery) != 0) {
        $queryBargains1 = "SELECT * FROM `bargain_details` WHERE `product_id` = " . $rowProducts['id'] . "  AND `status` = 1 AND `bargain_status` = 0 ORDER BY bidd_amount desc LIMIT 1";
        $queryBargains = "UPDATE `bargain_details` SET `status`= 2 , `bargain_status` = 1 WHERE `product_id` = " . $rowProducts['id'] . "  AND `status` = 1 AND `bargain_status` = 0 ORDER BY bidd_amount desc LIMIT 1";
        mysql_query($queryBargains);
        if ($resultBargains = mysql_query($queryBargains1)) {
            // send mail
            while ($rowProducts1 = mysql_fetch_array($resultBargains, MYSQL_ASSOC)) {

                $userQuery = "SELECT * FROM `buyer_details` WHERE `id` = " . $rowProducts1['user_id'];
                $result = mysql_query($userQuery);
                $user = mysql_fetch_object($result);
                $user->email;

                $to = 'aathira@intersmart.in ,';
                $to .= $user->email;

// subject
                $subject = 'Bid Confirmation - Your bid with DealsonIndia Product ' . $rowProducts["product_name"] . ' has been successfully placed!';

// message
                $message = '<html>
    <head>
        <title>Bid Confirmation - Your bid with DealsonIndia Product ' . $rowProducts["product_name"] . ' has been selected!</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>

    <body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
        <!-- Save for Web Slices (emailer.psd) -->
        <div style="margin:auto; width:776px; border:solid 2px #404241; margin-top:40px; margin-bottom:40px;">
            <table id="Table_01" width="776" border="0" cellpadding="0" cellspacing="0" align="center" style=" font-family: \'Open Sans\',arial, sans-serif;">
                   <tr>
                                        <td><a href="http://dealsonindia.com"><img src="<?php echo $this->siteURL(); ?>/images/emailer_logo.jpg" width="776" height="102" alt=""></a></td>
                                </tr>
                <tr>
                    <td>
                    
                    </td>
                </tr>

                <!--MAIL BODY-->
                <tr>
                    <td>
                        <br>
                        Congratulations<br><br>
                        Your bid with DealsonIndia Product ' . $rowProducts["product_name"] . ' has been selected!.<br>
                        Please login your account to checkout the product.
                        <br><br>
                    </td>
                </tr>



                <tr>
                    <td>
                        <img src="http:// ". $_SERVER[\'SERVER_NAME\'] . $_SERVER["REQUEST_URI"]." /images/emailer_01.jpg"" width="776" height="47" alt=""></td>
                </tr>
                <tr>
                    <td style="background-color:#f7f4f1"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="    font-family: \'Open Sans\',arial, sans-serif;font-size: 13px;">
                            <tbody>
                                <tr>
                                    <td width="250" align="center" style="border-right:solid 1px #d7d7d7;"><img src="http:// ". $_SERVER[\'SERVER_NAME\'] . $_SERVER["REQUEST_URI"]." /images/emailer_01.jpg" width="116" height="162" alt=""/></td>
                                    <td align="center" style="border-right:solid 1px #d7d7d7;">
                                        <h4 style=" font-family:\'Open Sans\',arial, sans-serif; font-size:16px; color:#414042; margin-bottom:10px;">Contact Us </h4>
                                        <p style="font-family:\'Open Sans\',arial, sans-serif; font-size:13px;">Tel: +91 914 220 2222Â <br>
                                            <a href="mailto:intersmarthosting.in" style="border:none; color:#414042;">info@dealsonindia.com</a><br>
                                            Mon to Sat 9.30am to 6.30pm IST</p></td>
                                    <td width="250" align="center"><h4 style=" font-family:\'Open Sans\',arial, sans-serif; font-size:16px; color:#414042; margin-bottom:10px;">Visit Us</h4>
                                        <p style="font-family:\'Open Sans\',arial, sans-serif; font-size:13px;">Lorem Ipsum dolor,<br>
                                            lorem Ipsum, dolar sit,<br>
                                            Lorem, Ipsum </p></td>
                                </tr>
                            </tbody>
                        </table></td>
                </tr>
            </table></div>
        <!-- End Save for Web Slices -->
    </body>
</html>
';

// To send HTML mail, the Content-type header must be set
                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= 'From: Deals on India <info@dealsonindia.com>'. "\r\n";

// Mail it
                mail($to, $subject, $message, $headers);
            }
            $queryUpdateStatus = "UPDATE `bargain_details` SET  `bargain_status` = 1 WHERE `product_id` = " . $rowProducts['id'] . "  AND `bargain_status` = 0 ORDER BY bidd_amount desc ";
            $resultUpdateStatus = mysql_query($queryUpdateStatus);
        }
    }
}



mysql_close();
