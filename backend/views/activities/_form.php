<?php
/**
 * Summary Text
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\SubSubjects;
use kartik\file\FileInput;
use yii\helpers\Url;
use backend\models\ActivityCategories;
use backend\models\ActivityQuestion;

/* @var $this yii\web\View */
/* @var $model backend\models\Settings */
/* @var $form yii\widgets\ActiveForm */
$template = \metronic\components\LayoutComponent::getFromTemplate();
$labelClass = \metronic\components\LayoutComponent::getFormLabelCssClass();


if (isset($model->age_start) && !empty($model->age_start)) {
    $model->age_start = $model->age_start . ';' . $model->age_end;
} else {
    $model->age_start = '10;40';
}
?>

<div class="portlet light bordered" id="form_wizard_1">

    <div class="row">
        <?php
        $form = ActiveForm::begin([
                    'options' => ['enctype' => 'multipart/form-data', 'id' => 'fileupload', 'class' => 'form-horizontal']]);
        ?>

        <div class="form-wizard">
            <div class="form-body">
                <ul class="nav nav-pills nav-justified steps">
                    <li>
                        <a href="#tab1" data-toggle="tab" class="step">
                            <span class="number"> 1 </span>
                            <span class="desc">
                                <i class="fa fa-check"></i> Activities </span>
                        </a>
                    </li>
                    <li>
                        <a href="#tab2" data-toggle="tab" class="step">
                            <span class="number"> 2 </span>
                            <span class="desc">
                                <i class="fa fa-check"></i> Design</span>
                        </a>
                    </li>
                    <li>
                        <a href="#tab3" data-toggle="tab" class="step active">
                            <span class="number"> 3 </span>
                            <span class="desc">
                                <i class="fa fa-check"></i> Evalution Design </span>
                        </a>
                    </li>
                    <li>
                        <a href="#tab4" data-toggle="tab" class="step">
                            <span class="number"> 4 </span>
                            <span class="desc">
                                <i class="fa fa-check"></i> Preview </span>
                        </a>
                    </li>
                </ul>
                <div id="bar" class="progress progress-striped" role="progressbar">
                    <div class="progress-bar progress-bar-success"> </div>
                </div>
                <div class="tab-content">
                    <div class="alert alert-danger display-none">
                        <button class="close" data-dismiss="alert"></button> You have some form errors. Please check below.
                    </div>
                    <div class="alert alert-success display-none">
                        <button class="close" data-dismiss="alert"></button> Your form validation is successful! 
                    </div>
                    <div class="tab-pane active" id="tab1">
                        <!-- END CONTENT -->
                        <?= $form->field($model, 'age_start', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textInput(['id' => 'range_3', 'value' => $model->age_start]) ?>

                        <?= $form->field($model, 'name', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textInput(['maxlength' => true]) ?>

                        <!--                        <div class="form-group form-md-line-input field-activities-name required" aria-required="true">
                                                    <label for="activities-name" class="control-label col-md-3">Name</label> 
                                                    <div class="col-md-6">
                                                        <input type="text" maxlength="64" name="name" class="form-control" id="activities-name">
                                                        <div class="form-control-focus"></div>
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div> -->
                        <?= $form->field($model, 'picture', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->fileInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'description', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textarea(['rows' => 6]) ?>

                        <?= $form->field($model, 'category', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->dropDownList(ArrayHelper::map(ActivityCategories::find()->all(), 'id', 'name'), ['prompt' => 'Select', 'class' => 'form-control bs-select']) ?>

                        <?= $form->field($model, 'time_to_prepare', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textInput() ?>

                        <?= $form->field($model, 'duration', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textInput() ?>

                        <?= $form->field($model, 'notes', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textarea(['rows' => 6]) ?>


                        <?php
                        echo $form->field($model, 'gallery[]', ['template' => $template, 'labelOptions' => ['multiple' => true, 'class' => $labelClass]])->widget(FileInput::classname(), [
                            'options' => ['multiple' => true, 'accept' => 'image/*'],
                            'pluginOptions' => [
                                'showPreview' => true,
                                'showCaption' => true,
                                'showRemove' => true,
                                'showUpload' => true,
                                'allowedFileExtensions' => ['jpg', 'gif', 'png'],
                                'uploadUrl' => Url::to(['/activities/imageuploads']),
//                                'uploadExtraData' => [
//                                    'album_id' => 20,
//                                    'cat_id' => 'Nature'
//                                ],
                                'maxFileCount' => 10
                            ]
                        ]);
                        ?>

                    </div>
                    <div class="tab-pane" id="tab2">
                        <div class="row">
                            <div class="col-lg-11" style="margin-left:55px;">
                                <?php
                                echo $form->field($model, 'add_your_files[]')->widget(FileInput::classname(), [
                                    'options' => ['multiple' => true],
                                    'pluginOptions' => [
                                        'showPreview' => true,
                                        'showCaption' => true,
                                        'showRemove' => true,
                                        'showUpload' => true,
                                        'allowedFileExtensions' => ['html', 'css', 'js'],
                                        'uploadUrl' => Url::to(['/activities/fileuploads']),
//                                'uploadExtraData' => [
//                                    'album_id' => 20,
//                                    'cat_id' => 'Nature'
//                                ],
                                        'maxFileCount' => 10
                                    ]
                                ]);
                                ?>  
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab3">
                        <?= $form->field($model, 'question')->dropDownList(ArrayHelper::map(ActivityQuestion::find()->where('id != 0')->all(), 'id', 'question'), ['onchange' => 'display(this.value);', 'style' => 'width:600px', 'id' => 'my_multi_select1', 'class' => 'form-control multi-select', 'multiple' => 'multiple']) ?>
                    </div>
                    <div class="tab-pane" id="tab4">
                        <h3 class="block">Confirm your Activities</h3>
                        <div class="portlet light tasks-widget bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <span class="caption-subject font-green-haze bold uppercase"> Activities:</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Age Start - Age Start :</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="Activities[age_start]"> </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Name:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="Activities[name]"> </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Description:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="Activities[description]"> </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Category:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="Activities[category]"> </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Time to Prepare:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="Activities[time_to_prepare]"> </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Duration:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="Activities[duration]"> </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Notes:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="Activities[notes]"> </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portlet light tasks-widget bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <span class="caption-subject font-green-haze bold uppercase">Design:</span>
                                </div>
                                <div class="actions">
                                    <a target="_blank" href="<?= Yii::getAlias('@web') . '/../uploads/file/' ?>" class="btn btn-default btn-circle">
                                        <i class="fa fa-plus"></i>
                                        <span class="hidden-480">
                                            Preview </span>
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div id="file-display"></div>        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portlet light tasks-widget bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <span class="caption-subject font-green-haze bold uppercase"> Evalution Desig:</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Question:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="Activities[question][]"> </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portlet light tasks-widget bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <span class="caption-subject font-green-haze bold uppercase">Gallery:</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div id="gallery-display"></div>        
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="form-actions" style="background-color: #f5f5f5;margin: 0;padding: 20px 10px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <a href="javascript:;" class="btn default button-previous">
                                                <i class="fa fa-angle-left"></i> Back </a>
                                            <a href="javascript:;" class="btn btn-outline green button-next" style="color:white !important"> Continue
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                            <input  type="submit" class="btn green button-submit" value="Submit" style="color:white !important">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<style>
    .blue.btn{
        display:none;
    }
    #my_multi_select1-error{
        margin-top: -35px !important;
        padding-left:50px;
    }
    #ms-my_multi_select1{
        width:90% !important;
        margin-left:50px;
    }
    #tab3 label{
        padding-left:50px;
    }
    .progress{
        height:24px !important;
    }
    /*    .kv-file-upload{
            display:none !important;
        }*/
</style>
<?php $link = Yii::getAlias('@web') . '/../uploads/gallery/' ?>
<?php $file = Yii::getAlias('@web') . '/../uploads/file/' ?>
<script>
    $(document).ready(function () {
        $('#activities-gallery').on('fileuploaded', function (event, data) {
            $("#gallery-display").empty();
            $('.fileinput-remove').hide();
            for (var i = 0; i < data.jqXHR.responseJSON.length; i++) {
                var obj = data.jqXHR.responseJSON[i];
                $('#gallery-display').append(
                        '<div class="col-lg-3"><img width="100% !important" src="<?php echo $link ?>' + obj + '" /></div>'
                        );
            }
//            console.log(data.jqXHR.responseJSON);
        });
        $('#activities-add_your_files').on('fileuploaded', function (event, data) {
            $("#file-display").empty();
            $('.fileinput-remove').hide();
            for (var i = 0; i < data.jqXHR.responseJSON.length; i++) {
                var obj = data.jqXHR.responseJSON[i];
                $('#file-display').append(
                        '<iframe width="100% !important" src="<?php echo $file ?>' + obj + '"></iframe>'
                        );
            }
//            console.log(data.jqXHR.responseJSON);
        });
    });

</script>