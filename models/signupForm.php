<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * classSignupForm
 * 
 * @author Benjamin Muthui <benmuthui98@gmail.com>
 * @package app\models
 */
class SignupForm extends Model
{
    public $email;
    public $password;
    public $password_repeat;

    public function rules()
    {
        return [
            [['email', 'password', 'password_repeat'], 'required'],
            [['email', 'password', 'password_repeat'], 'string', 'min' => 4, 'max' => 100],
            ['password_repeat', 'compare', 'compareAttribute' => 'password']
        ];
    }

    public function signup()
    {
        $user = new User();
        $user->EMAIL = $this->email;
        $user->PASSWORD = yii::$app->security->generatePasswordHash($this->password);
        $user->ACCESS_TOKEN = yii::$app->security->generateRandomString();
        $user->AUTH_KEY = yii::$app->security->generateRandomString();

        if ($user->save()) {

            return true;
        }
        // \yii::error("user was not saved. " . VarDumper::dumpAsString($user->errors));
        // return false();
    }
}