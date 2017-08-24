<?php

/**
 *  Activites
 */

namespace backend\controllers;

use Yii;
use backend\models\Activities;
use backend\models\ActivitiesSearch;
use backend\components\BackEndController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use backend\models\ActivityQuestionList;
use backend\models\ActivityGallery;
use backend\models\ActivityInstruction;

/**
 * ActivitiesController implements the CRUD actions for Activities model.
 */
class ActivitiesController extends BackEndController {

    /**
     * Page Heading
     */
    public $pageHeading = 'Activities';

    /**
     * Page Layout
     */
    public $layout = 'material_main';

    /**
     * Behavior of page
     */
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
     * Lists all Activities models.
     * @return mixed
     */
    public function actionIndex() {
        $pageSize = isset($_GET['per-page']) ? $_GET['per-page'] : 5;
        $searchModel = new ActivitiesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $pageSize);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'pageSize' => $pageSize
        ]);
    }

    /**
     * Displays a single Activities model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Activities model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Activities();
        if ($model->load(Yii::$app->request->post())) {
            // Picture 
            $model->picture = UploadedFile::getInstance($model, 'picture');
            $unique = $model->picture->baseName . '-' . uniqid() . '.' . $model->picture->extension;
            $model->picture->saveAs(\Yii::$app->basePath . '/../uploads/question/' . $unique);
            $model->picture = $unique;

            $age = explode(';', $_POST['Activities']['age_start']);
            $model->age_start = $age[0];
            $model->age_end = $age[1];
            $model->created_by = yii::$app->user->id;
            $model->hash = uniqid();
            $model->save(false);

            if (!empty($_POST['Activities']['question'])) {
                for ($i = 0; $i < sizeof($_POST['Activities']['question']); $i++) {
                    $subjectRequusties = new ActivityQuestionList();
                    $subjectRequusties->activity_id = $model->id;
                    $subjectRequusties->question_id = $_POST['Activities']['question'][$i];
                    $subjectRequusties->save(false);
                }
            }

            $gallery = \Yii::$app->session['gallery'];
            if (!empty($gallery)) {
                foreach ($gallery as $attachment) {
                    $subjectRequusties = new ActivityGallery();
                    $subjectRequusties->activity_id = $model->id;
                    $subjectRequusties->picture = $attachment;
                    $subjectRequusties->save(false);
                }
            }
            \Yii::$app->session->remove('gallery');

            $file = \Yii::$app->session['file'];

            if (!file_exists(\Yii::$app->basePath . '/../uploads/file/' . '/' . $model->hash)) {
                mkdir(\Yii::$app->basePath . '/../uploads/file/' . '/' . $model->hash, 0755, true);
            }
            if (!empty($file)) {
                foreach ($file as $attachment) {
                    $fileRequusties = new ActivityInstruction();
                    $fileRequusties->activity_id = $model->id;
                    $fileRequusties->link = $attachment;
                    $fileRequusties->save(false);
                    copy(\Yii::$app->basePath . '/../uploads/file/' . $attachment, \Yii::$app->basePath . '/../uploads/file/' . '/' . $model->hash . '/' . $attachment);
                    unlink(\Yii::$app->basePath . '/../uploads/file/' . $attachment);
                }
            }
            \Yii::$app->session->remove('file');
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            \Yii::$app->session->remove('gallery');
            \Yii::$app->session->remove('file');
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Activities model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            // Picture 
            if (isset($_FILES['Activities']['name']['pictureupdate']) && !empty($_FILES['Activities']['name']['pictureupdate'])) {
                $model->picture = UploadedFile::getInstance($model, 'pictureupdate');
                $unique = $model->picture->baseName . '-' . uniqid() . '.' . $model->picture->extension;
                $model->picture->saveAs(\Yii::$app->basePath . '/../uploads/question/' . $unique);
                $model->picture = $unique;
            }
            $age = explode(';', $_POST['Activities']['age_start']);
            $model->age_start = $age[0];
            $model->age_end = $age[1];
            $model->update_date = date('Y:m:d');
            $model->save(false);

            if (!empty($_POST['Activities']['question'])) {
                ActivityQuestionList::deleteAll(['activity_id' => $id]);
                for ($i = 0; $i < sizeof($_POST['Activities']['question']); $i++) {
                    $subjectRequusties = new ActivityQuestionList();
                    $subjectRequusties->activity_id = $model->id;
                    $subjectRequusties->question_id = $_POST['Activities']['question'][$i];
                    $subjectRequusties->save(false);
                }
            }

            $gallery = \Yii::$app->session['gallery'];
            if (!empty($gallery)) {
                foreach ($gallery as $attachment) {
                    $subjectRequusties = new ActivityGallery();
                    $subjectRequusties->activity_id = $model->id;
                    $subjectRequusties->picture = $attachment;
                    $subjectRequusties->save(false);
                }
            }
            \Yii::$app->session->remove('gallery');

            $file = \Yii::$app->session['file'];

            if (!file_exists(\Yii::$app->basePath . '/../uploads/file/' . '/' . $model->hash)) {
                mkdir(\Yii::$app->basePath . '/../uploads/file/' . '/' . $model->hash, 0755, true);
            }
            if (!empty($file)) {
                foreach ($file as $attachment) {
                    $fileRequusties = new ActivityInstruction();
                    $fileRequusties->activity_id = $model->id;
                    $fileRequusties->link = $attachment;
                    $fileRequusties->save(false);
                    copy(\Yii::$app->basePath . '/../uploads/file/' . $attachment, \Yii::$app->basePath . '/../uploads/file/' . '/' . $model->hash . '/' . $attachment);
                    unlink(\Yii::$app->basePath . '/../uploads/file/' . $attachment);
                }
            }
            \Yii::$app->session->remove('file');
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            \Yii::$app->session->remove('gallery');
            \Yii::$app->session->remove('file');
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Activities model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Deletes an existing Activities model.
     * Gallery Image Upload in case of Update.
     * @param string $id
     * @return json Reponse
     */
    public function actionImageuploadupdate($id) {
        $model = $this->findModel($id);
        $html = array();
        if (!empty($model->activityGalleries[0])) {
            foreach ($model->activityGalleries AS $picture) {
                $html[] = $picture->picture;
            }
        }
        $model->gallery = UploadedFile::getInstances($model, 'galleryupdate');
        if ($model->gallery) {
            foreach ($model->gallery as $attachment) {
                $unique = $attachment->baseName . '-' . uniqid() . '.' . $attachment->extension;
                $attachment->saveAs(\Yii::$app->basePath . '/../uploads/gallery/' . $unique);
                $tippIds = \Yii::$app->session['gallery'];
                $tippIds[] = $unique;
                \Yii::$app->session['gallery'] = $tippIds;
            }
        }
        return json_encode(array_merge($html, $tippIds));
    }

    /**
     * Deletes an existing Activities model.
     * Activity Gallery Image Upload.
     * @return mixed
     */
    public function actionImageuploads() {
        $model = new Activities();
        $model->gallery = UploadedFile::getInstances($model, 'gallery');
        if ($model->gallery) {
            foreach ($model->gallery as $attachment) {
                $unique = $attachment->baseName . '-' . uniqid() . '.' . $attachment->extension;
                $attachment->saveAs(\Yii::$app->basePath . '/../uploads/gallery/' . $unique);
                $tippIds = \Yii::$app->session['gallery'];
                $tippIds[] = $unique;
                \Yii::$app->session['gallery'] = $tippIds;
            }
//            return true;
        }
        return json_encode($tippIds);
    }

    /**
     * Deletes an existing Activities model.
     * Activity File Upload
     * @return mixed
     */
    public function actionFileuploads() {
        $model = new Activities();
        $model->add_your_files = UploadedFile::getInstances($model, 'add_your_files');
        if ($model->add_your_files) {
            foreach ($model->add_your_files as $attachment) {
                $unique = $attachment->baseName . '.' . $attachment->extension;
//                $unique = $attachment->baseName . '-' . uniqid() . '.' . $attachment->extension;
                $attachment->saveAs(\Yii::$app->basePath . '/../uploads/file/' . $unique);
                $tippIds = \Yii::$app->session['file'];
                $tippIds[] = $unique;
                \Yii::$app->session['file'] = $tippIds;
            }
        }
        return json_encode($tippIds);
    }

    /**
     * Deletes an existing Activities model.
     * Activity File upload in case of update.
     * @return mixed
     */
    public function actionFileupdate($id) {
        $model = $this->findModel($id);
        $html = array();
        if (!empty($model->activityInstructions[0])) {
            foreach ($model->activityInstructions AS $picture) {
                $html[] = $model->hash . '/' . $picture->link;
            }
        }
        $model->add_your_files = UploadedFile::getInstances($model, 'add_your_files');
        if ($model->add_your_files) {
            foreach ($model->add_your_files as $attachment) {
                $unique = $attachment->baseName . '.' . $attachment->extension;
//                $unique = $attachment->baseName . '-' . uniqid() . '.' . $attachment->extension;
                $attachment->saveAs(\Yii::$app->basePath . '/../uploads/file/' . $unique);
                $tippIds = \Yii::$app->session['file'];
                $tippIds[] = $unique;
                \Yii::$app->session['file'] = $tippIds;
            }
        }
        return json_encode(array_merge($html, $tippIds));
    }

    /**
     * Deletes an existing Activities model.
     * Activity Gallery Delete.
     * @param string $id
     * @return mixed
     */
    public function actionDeletegallery($id) {
        $model = ActivityGallery::findOne($id);
        $gallery = \Yii::$app->session['gallery'];
        if (!empty($gallery)) {
            $pos = array_search($model->picture, $gallery);
            unset($gallery[$pos]);
            \Yii::$app->session['gallery'] = $gallery;
        }

        $model->delete();
//        ActivityGallery::deleteAll(['id' => $id]);

        return true;
    }

    /**
     * Deletes an existing Activities model.
     * Activity uploaded File Delete
     * @param string $id
     * @return mixed
     */
    public function actionDeletefile($id) {
        $model = ActivityInstruction::findOne($id);
        $gallery = \Yii::$app->session['file'];
        if (!empty($gallery)) {
            $pos = array_search($model->link, $gallery);
            unset($gallery[$pos]);
            \Yii::$app->session['file'] = $gallery;
        }
        $model->delete();
        return true;
    }

    /**
     * Finds the Activities model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Activities the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Activities::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
