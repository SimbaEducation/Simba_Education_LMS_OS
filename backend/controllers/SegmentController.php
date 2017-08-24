<?php
/**
 *  Segment
 */
namespace backend\controllers;

use Yii;
use backend\models\Segment;
use backend\models\SegmentSearch;
use backend\components\BackEndController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SegmentController implements the CRUD actions for Segment model.
 */
class SegmentController extends BackEndController {

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
     * Lists all Segment models.
     * @return mixed
     */
    public function actionIndex() {
        $pageSize = isset($_GET['per-page']) ? $_GET['per-page'] : 5;
        $this->pageHeading = 'Segment';
        $this->pageDescription = 'Manager';

        $searchModel = new SegmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $pageSize);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'pageSize' => $pageSize,
        ]);
    }

    /**
     * Displays a single Segment model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Segment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Segment();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Segment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Segment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Segment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Segment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Segment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
