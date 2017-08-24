<?php
namespace common\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model
{
    public $email;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => '\common\models\User',
//                'filter' => ['active' => User::STATUS_ACTIVE],
                'message' => 'There is no user with such email.'
            ],
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return boolean whether the email was send
     */
    public function userExist()
    {
        
        /* @var $user User */
        $user = User::findOne([
//            'active' => User::STATUS_ACTIVE,
            'email' => $this->email,
        ]);

        if ($user) {
            return true;
        }

        return false;
    }
}
