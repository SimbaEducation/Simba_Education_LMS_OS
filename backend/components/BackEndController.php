<?php

namespace backend\components;

use Yii;
use common\components\GController;
use yii\web\ForbiddenHttpException;
use common\models\User;

/**
 * BackEnd controller
 *
 * @author Muhammad Hassan Jamil <hassan@granjur.com>
 * @since 1.0
 */
class BackEndController extends GController {

    public $layout = 'admin_main';

    // cant get Yii::$app->controller before in init() :(
    public function beforeAction($event) {
        //debug
        // echo Yii::$app->controller->id."-".Yii::$app->controller->action->id;
        // exit;
        if (isset(Yii::$app->user->id)) {
            //get current user
            $user = User::find()->where(['id' => Yii::$app->user->id])->one();
            //bypass admin
//            if ($user->user_type_id != User::TYPE_ADMIN) {
//                if (!\Yii::$app->user->can(Yii::$app->controller->id . "-" . Yii::$app->controller->action->id)) {
//                    // Forbidden!
//                    throw new ForbiddenHttpException('You are not allowed to do this action.');
//                }
//            }
        }
        return parent::beforeAction($event);
    }

}
