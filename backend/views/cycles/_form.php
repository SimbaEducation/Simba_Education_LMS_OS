<?php
/**
 * Summary Text
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
use yii\helpers\Url;
use backend\models\Segment;
use backend\models\CycleTemplates;
use backend\models\ActivityCategories;
use backend\models\Activities;

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
                                <i class="fa fa-check"></i> Cycles </span>
                        </a>
                    </li>
                    <li>
                        <a href="#tab2" data-toggle="tab" class="step">
                            <span class="number"> 2 </span>
                            <span class="desc">
                                <i class="fa fa-check"></i> Design</span>
                        </a>
                    </li>
                    <!--                    <li>
                                            <a href="#tab3" data-toggle="tab" class="step active">
                                                <span class="number"> 3 </span>
                                                <span class="desc">
                                                    <i class="fa fa-check"></i> Evalution Design </span>
                                            </a>
                                        </li>-->
                    <li>
                        <a href="#tab4" data-toggle="tab" class="step">
                            <span class="number"> 3 </span>
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

                        <?= $form->field($model, 'thumbnail', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->fileInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'segment_id', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->dropDownList(ArrayHelper::map(Segment::find()->all(), 'id', 'name'), ['prompt' => 'Select', 'class' => 'form-control bs-select']) ?>

                        <?= $form->field($model, 'short_description', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textarea(['rows' => 6]) ?>

                        <?= $form->field($model, 'long_description', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textarea(['rows' => 6]) ?>

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
                                'uploadUrl' => Url::to(['/cycles/imageuploads']),
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
                        <?= $form->field($model, 'cycle_template_id', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->dropDownList(ArrayHelper::map(CycleTemplates::find()->all(), 'id', 'name'), ['prompt' => 'Select', 'class' => 'form-control', 'onchange' => 'cycleTemplate(this);']) ?>    
                        <div id="template-cycle-one">

                        </div>
                    </div>
                    <!--<div class="tab-pane" id="tab3">Coming soon</div>-->
                    <div class="tab-pane" id="tab4">
                        <h3 class="block">Confirm your Cycles</h3>
                        <div class="portlet light tasks-widget bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <span class="caption-subject font-green-haze bold uppercase"> Cycles:</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Age Start - Age Start :</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="Cycles[age_start]"> </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Name:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="Cycles[name]"> </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Short Description:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="Cycles[short_description]"> </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Long Description:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="Cycles[long_description]"> </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Segment:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="Cycles[segment_id]"> </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Notes:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="Cycles[notes]"> </p>
                                            </div>
                                        </div>
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


<script type="text/javascript">
    function cycleTemplate(idx) {
        var val = idx.value;
        var cat;
        var a;
        if (val != '') {
            $.ajax({
                url: '<?= Url::to(['cycles/gettemplate']) ?>&id=' + val,
                type: 'POST',
                success: function (data)
                {
                    var obj = JSON.parse(data);
                    if (obj != undefined) {
                        $('#template-cycle-one').empty();
                        var a = '<table class="table table-hover"> <tr><td align="center" colspan="6"><h4 style="font-weight:bold">' + obj.name + '</h4></td></tr><tr>';
                        $.each(obj, function (index, val) {
                            if (val.dayName != undefined) {
//                    console.log(val.dayName);  
                                a += '<td><table class="table table-hover"><tr><th style="text-align:center">' + val.dayName + '</th><tr><tr><th>' + val.dayEmphasis + '</th><tr>';
                                var category = val['category'];
                                if (val['category'] != undefined) {
                                    $.each(category, function (i, cat) {
                                        a += '<tr><td style="color:white;font-weight:" bgcolor="' + cat.categoryColor + '">' + cat.dropDown + '<label class="label label-sm label-success pull-right" style="margin-top:5px;">' + cat.duration + ' Mins</label></td></tr>';
                                    });
                                }
                                a += '</table></td>';
                            }
                        });
                        a += '  </tr></table>';
//                $(<?php //echo json_encode(Html::dropDownList('cycle_template_one', null, ArrayHelper::map(ActivityCategories::find()->all(), 'id', 'name'), ['prompt' => 'Select Category', 'class' => 'form-control']))       ?>).clone().appendTo('#template-cycle-one');
                        $(a).clone().appendTo('#template-cycle-one');
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown)
                {

                }
            });
            return false;
        } else {
            $('#template-cycle-one').empty();
//            alert('Please Select the Template');
        }
    }
</script>