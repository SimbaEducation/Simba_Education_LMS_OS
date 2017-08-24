<?php
/**
 *  Post
 */
namespace backend\controllers;

use Yii;
use backend\models\Post;
use backend\models\PostSearch;
use backend\models\PostType;
use backend\components\BackEndController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends BackEndController {

    public $pageHeading = 'Post';
    public $layout = 'material_main';

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
//                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex() {
        $pageSize = isset($_GET['per-page']) ? $_GET['per-page'] : 5;
        $this->pageHeading = 'Post';
        $this->pageDescription = 'Manager';

        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $pageSize);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'pageSize' => $pageSize
        ]);
    }

    /**
     * Displays a single Post model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Post();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            for ($i = 0; $i < sizeof($_POST['Post']['type']); $i++) {
                $newsType = new postType();
                $newsType->post_id = $model->id;
                $newsType->type_id = $_POST['Post']['type'][$i];
                $newsType->save(false);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            PostType::deleteAll(['post_id' => $id]);
            for ($i = 0; $i < sizeof($_POST['Post']['type']); $i++) {
                $newsType = new postType();
                $newsType->post_id = $model->id;
                $newsType->type_id = $_POST['Post']['type'][$i];
                $newsType->save(false);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
