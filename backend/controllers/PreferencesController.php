<?php
/**
 *  Preference
 */
namespace backend\controllers;

use Yii;
use backend\models\ActivityCategories;
use backend\models\ActivityCategoriesSearch;
use backend\models\CategorySearch;
use backend\components\BackEndController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\DomainOfSubject;
use backend\models\DomainOfSubjectSearch;
use backend\models\TypesOfCycles;
use backend\models\TypesOfCyclesSearch;
use backend\models\Standards;
use backend\models\StandardsSearch;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class PreferencesController extends BackEndController {

    public $pageHeading = 'Preferences';
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
     * Tab of All Preferences.
     * @return mixed
     */
    public function actionIndex() {
        $check = isset($_GET['check']) ? $_GET['check'] : '0';
        $this->pageHeading = 'Preferences';
        $this->pageDescription = 'Manager';
        $pageSize = isset($_GET['per-page']) ? $_GET['per-page'] : 5;
        $searchModel = new ActivityCategoriesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $pageSize);

        //    return $this->redirect(['index', 'check' => 0,'page'=>2,'per-page'=>2]); 

        $searchDomainOfSubject = new DomainOfSubjectSearch();
        $dataProviderOfDomainOfSubject = $searchDomainOfSubject->search(Yii::$app->request->queryParams,$pageSize);

        $searchTypesOfCycles = new TypesOfCyclesSearch();
        $dataProvidersearchTypesOfCycles = $searchTypesOfCycles->search(Yii::$app->request->queryParams,$pageSize);

        $searchStandards = new StandardsSearch();
        $dataProvidersearchStandards = $searchStandards->search(Yii::$app->request->queryParams,$pageSize);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'searchDomainOfSubject' => $searchDomainOfSubject,
                    'dataProviderOfDomainOfSubject' => $dataProviderOfDomainOfSubject,
                    'searchTypesOfCycles' => $searchTypesOfCycles,
                    'dataProvidersearchTypesOfCycles' => $dataProvidersearchTypesOfCycles,
                    'searchStandards' => $searchStandards,
                    'dataProvidersearchStandards' => $dataProvidersearchStandards,
                    'check' => $check,
                    'pageSize' => $pageSize,
        ]);
    }

    /**
     * Creates a new ActivityCategories model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $check = $_GET['check'];
        $model = new DomainOfSubject();
        $searchModel = new ActivityCategoriesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->redirect(['view', 'id' => $model->id, 'check' => 1]);
        } else {
            return $this->render('create', [
                        'model' => $model,
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                        'check' => $check,
            ]);
        }
    }

    /**
     * Updates an existing ActivityCategories model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $check = $_GET['check'];
        $searchModel = new ActivityCategoriesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = DomainOfSubject::findOne($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->redirect(['view', 'id' => $model->id, 'check' => 1]);
        } else {
            return $this->render('update', [
                        'model' => $model,
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                        'check' => $check,
            ]);
        }
    }

    /**
     * Displays a single ActivityCategories model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {
        $check = $_GET['check'];
        if ($check == 1) {
            $searchModel = new ActivityCategoriesSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('view', [
                        'model' => DomainOfSubject::findOne($id),
                        'check' => $check,
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
            ]);
        } else if ($check == 0) {
            return $this->render('view', [
                        'model' => ActivityCategories::findOne($id),
                        'check' => $check,
            ]);
        }
    }

}
