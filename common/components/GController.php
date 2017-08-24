<?php

namespace common\components;

use Yii;
use yii\web\Controller;
//use common\models\User;
use backend\models\User;
use backend\models\Settings;

/**
 * Our base controller
 *
 * @author Muhammad Hassan Jamil <hassan@granjur.com>
 * @since 1.0
 */
class GController extends Controller {

    public $layout = '@app/views/layouts/main';

    /**
     * Page header setting
     * @see page main layout file
     */
    public $pageHeading = '';

    /**
     * Page header setting
     * @see page main layout file
     */
    public $pageDescription = '';

    /**
     * Recommmended to overwrite this in base controller if no such action 
     */
    public $defaultAction = 'index';

    /**
     * Variable to pass data from controller to layout files
     */
    public $params = [];

    public function init() {
        parent::init();

        $this->params['siteLogo'] = Settings::getSiteLogo();
        $this->params['displayOption'] = [
            0 => 'display: none;',
            1 => ''
        ];
    }

    public function sendEmail($type, $dataArr = false) {
        $this->loadSettingsForSmtp();
        $params = array();
        switch ($type) {
            case 'forgot': {
                    $user = User::findOne([
//                    'active' => User::STATUS_ACTIVE,
                                'email' => $dataArr["to"],
                    ]);
                    if ($user) {
                        if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
                            $user->generatePasswordResetToken();
                        }
                        if ($user->save()) {
                            $params['to'] = $dataArr['to'];
                            $params['model'] = $user;
                            $params['subject'] = 'Password Reset ' . \Yii::$app->name;
                            $params['layout'] = 'passwordResetToken-html';
                            return $this->sendViaSmtp($params);
                        }
                    }
                }
            case 'user-create': {

                    $params['to'] = $dataArr['to'];
                    $params['model'] = $dataArr['model'];
                    $params['subject'] = 'Account Created ' . \Yii::$app->name;
                    $params['layout'] = 'userCreate-html';
                    return $this->sendViaSmtp($params);
                }
            case 'user-invite': {

                    $params['to'] = $dataArr['to'];
                    $params['model'] = $dataArr['model'];
                    $params['subject'] = 'Invite From ' . \Yii::$app->name;
                    $params['layout'] = 'userInvite-html';
                    return $this->sendViaSmtp($params);
                }
            case 'user-invite-project': {
                    $params['to'] = $dataArr['to'];
                    $params['model'] = $dataArr['model'];
                    $params['subject'] = 'Project Invitation From ' . \Yii::$app->name;
                    $params['layout'] = 'userInviteProject-html';
                    return $this->sendViaSmtp($params);
                }
            default: {
                    //do nothing
                    break;
                }
        }
    }

    private function loadSettingsForSmtp() {
        Yii::$app->set('mailer', [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => Yii::$app->settings->getValue('smtp', 'host'),
                'username' => Yii::$app->settings->getValue('smtp', 'username'),
                'password' => Yii::$app->settings->getValue('smtp', 'password'),
                'port' => Yii::$app->settings->getValue('smtp', 'port'),
                'encryption' => Yii::$app->settings->getValue('smtp', 'encryption'),
            ],
        ]);
    }

    private function sendViaSmtp($params) {
        return \Yii::$app->mailer->compose([ 'html' => $params["layout"]], ['model' => $params["model"]])
                        ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name])
                        ->setTo($params['to'])
                        ->setSubject($params['subject'])
                        ->send();
    }

    public function replaceEmailText($str, $documentPatterns) {
        foreach ($documentPatterns as $pattern => $valueData) {
            if (preg_match_all($pattern, $str, $matches)) {
                $str = preg_replace($pattern, $valueData, $str);
            }
        }
        return array('status' => true, 'str' => $str);
    }

}
