<?php
/**
 *  Users
 */
namespace backend\controllers;

use Yii;
use backend\models\User;
use backend\models\UserSearch;
use backend\components\BackEndController;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class UserController extends BackEndController {

    public $pageHeading = 'Users';
    public $layout = 'material_main';

//    public function behaviors() {
//        return [
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'delete' => ['post'],
//                ],
//            ],
//            'access' => [
//                'class' => \yii\filters\AccessControl::className(),
//                'only' =>
//                [
//                    'index',
//                    'create',
//                    'update' 
//                ],
//                'rules' => [
//                    // allow authenticated users
//                    [
//                        'allow' => true,
//                        //'roles' => ['@'],
//                        'matchCallback' => function() {
//                            if (!Yii::$app->user->isGuest) {
//                                if (Yii::$app->user->identity->user_type == 1) {
//                                    return true;
//                                } else {
//                                    return $this->redirect(Yii::$app->urlManager->createUrl('site/logout'), 302);
//                                }
//                            } else {
//                                return false;
//                            }
//                        }
//                    ],
//                // everything else is denied
//                ],
//            ],
//        ];
//    }

    /**
     * List of Users
     * @return mixed
     */
    public function actionIndex() {
        $pageSize = isset($_GET['per-page']) ? $_GET['per-page'] : 5;
        $this->pageHeading = 'User';
        $this->pageDescription = 'Manager';

        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $pageSize);

        return $this->render('index', array('dataProvider' => $dataProvider, 'searchModel' => $searchModel, 'pageSize' => $pageSize,));
    }

    /**
     * Create a New User
     * If create is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new User();
        $model->scenario = 'create';
        $load = $model->load(Yii::$app->request->post());

        if ($load && $model->validate()) {
            $model->setPassword($model->password);
            $model->generateAuthKey();
        }

        if ($load && $model->save(false)) {
            return $this->redirect(['index']);
//            Yii::$app->getSession()->setFlash('flashMessages', ['type' => 'success',
//                'duration' => 12000,
//                'message' => 'User Created.',
//            ]);
        }

        return $this->render('create', ['model' => $model]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $model->scenario = 'update';
        $load = $model->load(Yii::$app->request->post());


        if ($load && $model->validate()) {
            // password should be left blank - if no change is required
            if (!empty($model->password))
                $model->setPassword($model->password);
        }

        if ($load && $model->save(false)) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);

        if ($model->id != 1) {
            $model->delete();
        } else
            throw new ForbiddenHttpException('You are not allowed to do this action.');

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
