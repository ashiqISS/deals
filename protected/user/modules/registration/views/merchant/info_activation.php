<br><br><br>
Hi Merchant,<br> we have sent a verification link to your e-mail address <?php echo $model->email; ?>.
<br>Please click on the verification link to help us create your account.
<br><br>
<br>Please note
<br>It might take upto 2-3 minutes for verification mail to arrive.
<br>Please check your Spam/Junk/Promotions folder as well if you don't receive the mail in your Inbox.
<br>
<a href="<?php echo MerchantController::siteURL()."user.php/merchant-activation?id=".$model->email_verification; ?>"> Click here to activate </a>
<br><br><br>
