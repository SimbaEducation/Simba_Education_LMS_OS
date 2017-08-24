<?php
/**
 *  Cycle Template
 */
namespace backend\controllers;

use Yii;
use backend\models\CycleTemplates;
use backend\models\CycleTemplatesSearch;
use backend\components\BackEndController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\CycleTemplateDays;
use backend\models\CycleTemplateDaysCategories;
use backend\models\TypesOfCycles;
use \backend\models\ActivityCategories;

/**
 * CycleTemplatesController implements the CRUD actions for CycleTemplates model.
 */
class CycleTemplatesController extends BackEndController {

    public $pageHeading = 'Cycle Templates';
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
     * Lists all CycleTemplates models.
     * @return mixed
     */
    public function actionIndex() {
        $pageSize = isset($_GET['per-page']) ? $_GET['per-page'] : 5;
        $searchModel = new CycleTemplatesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $pageSize);

        \Yii::$app->session->remove('name');
        \Yii::$app->session->remove('activityCategory');
        \Yii::$app->session->remove('activityCategoryId');
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'pageSize' => $pageSize,
        ]);
    }

    /**
     * Displays a single CycleTemplates model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {
        \Yii::$app->session->remove('name');
        \Yii::$app->session->remove('activityCategory');
        \Yii::$app->session->remove('activityCategoryId');
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Select a  Type of cycle model.
     * If creation is successful, the browser will be redirected to the 'Createtemplate' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new CycleTemplates();

        if ($model->load(Yii::$app->request->post())) {
            \Yii::$app->session['name'] = $_POST['CycleTemplates']['name'];
            \Yii::$app->session['activityCategoryId'] = $_POST['CycleTemplates']['type_of_cycle_id'];
            $type = TypesOfCycles::findOne($_POST['CycleTemplates']['type_of_cycle_id']);
            \Yii::$app->session['activityCategory'] = $type->days;
            return $this->redirect(['createtemplate']);
        }
        \Yii::$app->session->remove('name');
        \Yii::$app->session->remove('activityCategory');
        \Yii::$app->session->remove('activityCategoryId');
        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Creates a new CycleTemplates model.
     * If creation is successful, the browser will be redirected to the 'View' page.
     * @return mixed
     */
    public function actionCreatetemplate() {
        $model = new CycleTemplates();

        if (isset($_POST) && !empty($_POST)) {
            ;
            $model->name = \Yii::$app->session['name'];
            $model->type_of_cycle_id = \Yii::$app->session['activityCategoryId'];
            $model->save(false);

            for ($i = 1; $i <= \Yii::$app->session['activityCategory']; $i++) {
                $cycleTemplateDay = new CycleTemplateDays();
                $cycleTemplateDay->name = $_POST['DayTemplates' . $i];
                $cycleTemplateDay->emphasis = $_POST['EmphasisTemplates' . $i];
                $cycleTemplateDay->cycle_template_id = $model->id;
                $cycleTemplateDay->position = $i;
                $cycleTemplateDay->save(false);
                $count = 0;
                foreach ($_POST['DurationANDActivityCategoryTemplates' . $i]['duration'] as $val) {
                    $category = array_values($_POST['DurationANDActivityCategoryTemplates' . $i]['activity_category']);
                    $cycleCategory = new CycleTemplateDaysCategories();
                    $cycleCategory->duration = $val;
                    $cycleCategory->activity_category_id = $category[$count];
                    $cycleCategory->cycle_template_days_id = $cycleTemplateDay->id;
                    $cycleCategory->position = $count + 1;
                    $cycleCategory->save(false);
                    $count++;
                }
            }
//            exit;
            return $this->redirect(['view', 'id' => $model->id]);
        }
        if (isset(\Yii::$app->session['activityCategory'])) {
            return $this->render('createtemplate', [
                        'model' => $model,
            ]);
        } else {
            return $this->redirect(['create']);
        }
    }

    /**
     * Updates an existing Type of Cycle model.
     * If update is successful, the browser will be redirected to the 'Updatetemplate' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            \Yii::$app->session['name'] = $_POST['CycleTemplates']['name'];
            \Yii::$app->session['activityCategoryId'] = $_POST['CycleTemplates']['type_of_cycle_id'];
            $type = TypesOfCycles::findOne($_POST['CycleTemplates']['type_of_cycle_id']);
            \Yii::$app->session['activityCategory'] = $type->days;
            $model->save(false);
            return $this->redirect(['updatetemplate', 'id' => $model->id]);
        }
        \Yii::$app->session->remove('name');
        \Yii::$app->session->remove('activityCategory');
        \Yii::$app->session->remove('activityCategoryId');
        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Update a Templates model of cycle.
     * If Updation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionUpdatetemplate($id) {
        $model = $this->findModel($id);
        if (isset($_POST) && !empty($_POST)) {
            CycleTemplateDays::deleteAll(['cycle_template_id' => $id]);
            for ($i = 1; $i <= \Yii::$app->session['activityCategory']; $i++) {
                $cycleTemplateDay = new CycleTemplateDays();
                $cycleTemplateDay->name = $_POST['DayTemplates' . $i];
                $cycleTemplateDay->emphasis = $_POST['EmphasisTemplates' . $i];
                $cycleTemplateDay->cycle_template_id = $model->id;
                $cycleTemplateDay->position = $i;
                $cycleTemplateDay->save(false);
                $count = 0;
                foreach ($_POST['DurationANDActivityCategoryTemplates' . $i]['duration'] as $val) {
                    $category = array_values($_POST['DurationANDActivityCategoryTemplates' . $i]['activity_category']);
                    $cycleCategory = new CycleTemplateDaysCategories();
                    $cycleCategory->duration = $val;
                    $cycleCategory->activity_category_id = $category[$count];
                    $cycleCategory->cycle_template_days_id = $cycleTemplateDay->id;
                    $cycleCategory->position = $count + 1;
                    $cycleCategory->save(false);
                    $count++;
                }
            }
//            exit;
            return $this->redirect(['view', 'id' => $model->id]);
        }
        if (isset(\Yii::$app->session['activityCategory'])) {
            return $this->render('updatetemplate', [
                        'model' => $model,
            ]);
        } else {
            return $this->redirect(['index']);
        }
    }

    /**
     * Deletes an existing CycleTemplates model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CycleTemplates model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return CycleTemplates the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = CycleTemplates::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Get Color of Acttivity Category
     * @return mixed
     */
    public function actionGetcolor($id) {
        $model = ActivityCategories::findOne($id);
        echo $model->color_code;
        exit;
    }

}
