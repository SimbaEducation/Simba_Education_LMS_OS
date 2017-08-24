<?php

/**
 *  User Type
 */

namespace backend\controllers;

use Yii;
use backend\models\UserType;
use backend\models\UserTypeSearch;
use backend\components\BackEndController;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * UserTypeController implements the CRUD actions for UserType model.
 */
class UserTypeController extends BackEndController {

    public $pageHeading = 'User Types';
    public $layout = 'material_main';

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
//                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all UserType models.
     * @return mixed
     */
    public function actionIndex() {
        $pageSize = isset($_GET['per-page']) ? $_GET['per-page'] : 5;
        $this->pageHeading = 'User Type';
        $this->pageDescription = 'Manager';

        $searchModel = new UserTypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $pageSize);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'pageSize' => $pageSize,
        ]);
    }

    /**
     * Displays a single UserType model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new UserType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new UserType();
        $load = $model->load(Yii::$app->request->post());
        if ($load) {
            // useless model field for now - hardcode to active = true
            $model->status = 1;
            $model->added_at = date('U');
            $model->updated_at = date('U');
        }
        if ($load && $model->save()) {
            //create role if it doesnt exist.
            Yii::$app->getSession()->setFlash('flashMessages', ['type' => 'success',
                'duration' => 12000,
                'message' => 'User Role created.',
            ]);
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing UserType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        // if (!\Yii::$app->user->can('updateType')) {
        //     // Forbidden!
        //     throw new ForbiddenHttpException('You are not allowed to do this action.');
        // }
        $model = $this->findModel($id);
        $post = Yii::$app->request->post();
        $load = $model->load($post);

        if ($load) {
            $model->updated_at = date('U');
        }

        if ($load && $model->save()) {
            // update permissions for this role.

            Yii::$app->getSession()->setFlash('flashMessages', ['type' => 'success',
                'duration' => 12000,
                'message' => 'User Role updated.',
            ]);
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing UserType model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        //if default type, do not delete
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UserType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = UserType::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
