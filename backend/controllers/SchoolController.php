<?php
/**
 *  School
 */
namespace backend\controllers;

use Yii;
use backend\models\School;
use backend\models\SchoolSearch;
use backend\components\BackEndController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\UserSchool;
use backend\models\User;
use yii\base\DynamicModel;
use yii\web\UploadedFile;

/**
 * SchoolController implements the CRUD actions for School model.
 */
class SchoolController extends BackEndController {

    public $pageHeading = 'Schools';
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
     * Lists all School models.
     * @return mixed
     */
    public function actionIndex() {
        $pageSize = isset($_GET['per-page']) ? $_GET['per-page'] : 5;
        $this->pageHeading = 'School';
        $this->pageDescription = 'Manager';

        $searchModel = new SchoolSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $pageSize);
//        echo '<pre>';
//        print_r($dataProvider);
//        exit;
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'pageSize' => $pageSize,
        ]);
    }

    /**
     * Displays a single School model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new School model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new School();
        $user = new User();
        $load = $model->load(Yii::$app->request->post()) && $user->load(Yii::$app->request->post());

        if ($load) {
            if ($_POST['userSelection'] == 'new') {
                $model->attributes = $_POST['school'];
                $user->scenario = 'create';
//                $model->scenario = 'image';
                $user->password = $_POST['User']['password'];
                $model->school_logo = UploadedFile::getInstance($model, 'school_logo');
                if ($model->validate(['name', 'school_logo', 'address', 'phone', 'status', 'segment_id', 'max_number_of_students', 'max_number_of_teachers']) && $user->validate(['username', 'password', 'first_name', 'about', 'last_name', 'email'])) {
                    $model->school_logo->saveAs(\Yii::$app->basePath . '/../uploads/school/' . $model->school_logo->baseName . '.' . $model->school_logo->extension);
                    $model->school_logo = $model->school_logo->baseName . '.' . $model->school_logo->extension;
                    $model->save(false);
                    $user->user_type = User::USER_ROLE_SCHOOL_ADMINISTRATOR;
                    $user->setPassword($user->password);
                    $user->generateAuthKey();
                    $user->save(false);

                    $school = new UserSchool();
                    $school->attributes();
                    $school->school_id = $model->id;
                    $school->user_id = $user->id;
                    $school->save(false);
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
            if ($_POST['userSelection'] == 'existing') {
                $model->school_logo = UploadedFile::getInstance($model, 'school_logo');
                if ($model->validate()) {
                    $model->school_logo->saveAs(\Yii::$app->basePath . '/../uploads/school/' . $model->school_logo->baseName . '.' . $model->school_logo->extension);
                    $model->school_logo = $model->school_logo->baseName . '.' . $model->school_logo->extension;
                    $model->save(false);
                    $school = new UserSchool();
                    $school->attributes();
                    $school->school_id = $model->id;
                    $school->user_id = $_POST['school']['school_manager'];
                    $school->save(false);
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }
        return $this->render('create', [
                    'model' => $model,
                    'user' => $user,
        ]);
    }

    /**
     * Updates an existing School model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $last = $model->school_logo;
        $user = new User();
        $load = $model->load(Yii::$app->request->post()) && $user->load(Yii::$app->request->post());
        if ($load) {
            if ($_POST['userSelection'] == 'new') {
                if ($model->validate(['name', 'address', 'phone', 'status', 'segment_id', 'max_number_of_students', 'max_number_of_teachers']) && $user->validate(['username', 'first_name', 'about', 'last_name', 'email'])) {
                    if (isset($_FILES['school']['name']['school_logo']) && !empty($_FILES['school']['name']['school_logo'])) {
                        $model->school_logo = UploadedFile::getInstance($model, 'school_logo');
                        if ($model->validate(['school_logo'])) {
                            $model->school_logo->saveAs(\Yii::$app->basePath . '/../uploads/school/' . $model->school_logo->baseName . '.' . $model->school_logo->extension);
                            $model->school_logo = $model->school_logo->baseName . '.' . $model->school_logo->extension;
                            $model->save(false);
                            $user->user_type = User::USER_ROLE_SCHOOL_ADMINISTRATOR;
                            $user->setPassword($user->password);
                            $user->generateAuthKey();
                            $user->save(false);

                            \Yii::$app->db->createCommand("UPDATE user_school SET user_id=:user_id WHERE school_id=:school_id")
                                    ->bindValue(':school_id', $model->id)
                                    ->bindValue(':user_id', $user->id)
                                    ->execute();
                            return $this->redirect(['view', 'id' => $model->id]);
                        }
                    } else {
                        $model->save(false);
                        $user->user_type = User::USER_ROLE_SCHOOL_ADMINISTRATOR;
                        $user->setPassword($user->password);
                        $user->generateAuthKey();
                        $user->save(false);

                        \Yii::$app->db->createCommand("UPDATE user_school SET user_id=:user_id WHERE school_id=:school_id")
                                ->bindValue(':school_id', $model->id)
                                ->bindValue(':user_id', $user->id)
                                ->execute();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }
            }
            if ($_POST['userSelection'] == 'existing') {
                if ($model->validate(['name', 'address', 'phone', 'status', 'segment_id', 'max_number_of_students', 'max_number_of_teachers'])) {
                    if (isset($_FILES['school']['name']['school_logo']) && !empty($_FILES['school']['name']['school_logo'])) {
                        $model->school_logo = UploadedFile::getInstance($model, 'school_logo');
                        if ($model->validate(['school_logo'])) {
                            $model->school_logo->saveAs(\Yii::$app->basePath . '/../uploads/school/' . $model->school_logo->baseName . '.' . $model->school_logo->extension);
                            $model->school_logo = $model->school_logo->baseName . '.' . $model->school_logo->extension;
                            $model->save(false);
                            \Yii::$app->db->createCommand("UPDATE user_school SET user_id=:user_id WHERE school_id=:school_id")
                                    ->bindValue(':school_id', $model->id)
                                    ->bindValue(':user_id', $model->school_manager)
                                    ->execute();
                            return $this->redirect(['view', 'id' => $model->id]);
                        }
                    } else {
                        $model->school_logo = $last;
                        $model->save(false);
                        \Yii::$app->db->createCommand("UPDATE user_school SET user_id=:user_id WHERE school_id=:school_id")
                                ->bindValue(':school_id', $model->id)
                                ->bindValue(':user_id', $model->school_manager)
                                ->execute();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }
            }
        }
        return $this->render('update', [
                    'model' => $model,
                    'user' => $user,
        ]);
    }

    /**
     * Deletes an existing School model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the School model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return School the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = School::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
