<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    /**
     * Authenticates a user.
     * The example implementation makes sure if the email and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {

        $password = "";


        // for merchant login
        if (Merchant::model()->findByAttributes(array('email' => $this->username))) {
            $user = Merchant::model()->findByAttributes(array('email' => $this->username));
            $password = $user->password;
            $merchant_id = $user->id;
            $merchant_name = $user->fullname;
            Yii::app()->user->setState('user_mail', $this->username);
            Yii::app()->user->setState('user_id', $merchant_id);
            Yii::app()->user->setState('user_type', 'merchant');
            Yii::app()->user->setState('user_name', $merchant_name);
        }


        // for buyer login
        if (BuyerDetails::model()->findByAttributes(array('email' => $this->username))) {
            $user = BuyerDetails::model()->findByAttributes(array('email' => $this->username));
            $password = $user->password;
            $buyer_id = $user->id;
            $name = $user->first_name . ' ' . $user->last_name;
            Yii::app()->user->setState('user_mail', $this->username);
            Yii::app()->user->setState('user_id', $buyer_id);
            Yii::app()->user->setState('user_type', 'buyer');
            Yii::app()->user->setState('user_name', $name);
        }



        if ($this->username === null)
            $this->errorCode = self::ERROR_USERNAME_INVALID;

        elseif ($password !== $this->password)
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else
            $this->errorCode = self::ERROR_NONE;
        return !$this->errorCode;
    }

}
