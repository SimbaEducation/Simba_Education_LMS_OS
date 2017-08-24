<?php
/**
 * Summary Text
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use backend\models\TypesOfCycles;
use backend\models\ActivityCategories;
use backend\models\Settings;

/* @var $this yii\web\View */
/* @var $model backend\models\ActivityCategories */
/* @var $form yii\widgets\ActiveForm */
$template = \metronic\components\LayoutComponent::getFromTemplate();
$labelClass = \metronic\components\LayoutComponent::getFormLabelCssClass();
$counter = 0;
$settingsDuration = Settings::find()->where('settingName="default_lesson_duration"')->one();
?>

<div class="portlet light bordered" id="form_wizard_2">
    <div class="row">
        <div style="display:none">
            <?php
            for ($i = 1; $i <= \Yii::$app->session['activityCategory']; $i++) {
                ?>
                <div id="cycle-template-category-hide<?= $i ?>" >

                    <div class="form-group form-md-line-input field-activityquestion-type required">
                        <label for="activityquestion-type" class="control-label col-md-3">Duration</label>
                        <div class="col-md-3">
                            <?= Html::textInput('DurationANDActivityCategoryTemplates' . $i . '[duration][]', $settingsDuration->settingValue, ['class' => 'form-control']) ?>
                            <div class="pull-right">Mins</div>
                            <div class="help-block"></div>

                        </div>

                        <div class="col-md-3" style="margin-left:50px" >
                            <?= Html::dropDownList('DurationANDActivityCategoryTemplates' . $i . '[activity_category][]', null, ArrayHelper::map(ActivityCategories::find()->all(), 'id', 'name'), ['prompt' => 'Select Category', 'class' => 'form-control', 'onchange' => 'newactivitycolor(this);']) ?>       
                            <div class="help-block"></div>
                        </div>
                        <div class="">
                            <a href="javascript:;" class="btn btn-danger btn-sm" style="color:white !important;font-weight:bold" onclick="return doRemove(this,<?= $i ?>)">Remove</a>
                        </div>
                    </div>


                </div>
            <?php } ?>
        </div> 
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'name' => 'cycle', 'id' => 'cycle', 'class' => 'form-horizontal']]); ?>


        <div class="form-wizard">
            <div class="form-body">
                <ul class="nav nav-pills nav-justified steps">
                    <?php
                    for ($i = 1; $i <= \Yii::$app->session['activityCategory']; $i++) {
                        ?>
                        <li>
                            <a href = "#tab<?= $i ?>" data-toggle = "tab" class = "step">
                                <span class = "number"> <?= $i ?> </span>
                                <span class = "desc">
                                    <i class = "fa fa-check"></i> Day <?= $i ?> </span>
                            </a>
                        </li>
                    <?php }
                    ?>
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
                    <?php
                    for ($i = 1; $i <= \Yii::$app->session['activityCategory']; $i++) {
                        ?>
                        <div class="tab-pane active" id="tab<?= $i ?>">
                            <div class="form-group form-md-line-input field-cycletemplates-for_day-1 has-success">
                                <label for="" class="control-label col-md-3">Day Name</label> 
                                <div class="col-md-6">
                                    <?= Html::textInput('DayTemplates' . $i, null, ['class' => 'form-control']) ?>  
                                </div>
                            </div>
                            <div class="form-group form-md-line-input field-cycletemplates-for_day-1 has-success">
                                <label for="" class="control-label col-md-3">Emphasis</label> 
                                <div class="col-md-6">
                                    <?= Html::textInput('EmphasisTemplates' . $i, null, ['class' => 'form-control']) ?>  
                                </div>
                            </div>
                            <div id="cycle-template-category-show<?= $i ?>"></div>
                            <div class="pull-right">
                                <a href="javascript:;"class="btn btn-default btn-circle" onclick="return chk(<?= $i ?>)" ><i class="fa fa-plus"></i>Add More</a>
                            </div>
                        </div>
                    <?php }
                    ?>
                </div>
                <input type="hidden" name="counter" id="counter" value="1" />
                <div class="clearfix" style="margin-bottom:10px;"></div>
                <div class="form-actions" style="background-color: #f5f5f5;margin: 0;padding: 20px 10px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <a href="javascript:;" class="btn default button-previous">
                                                <i class="fa fa-angle-left"></i> Back </a>
                                            <a href="javascript:;" class="btn btn-outline green button-next" onclick="return continues()" style="color:white !important"> Continue
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
    .help-block{
        color: #F3565D !important;
    }
</style>
<script type="text/javascript">
    $(document).ready(function () {
<?php
for ($i = 1; $i <= \Yii::$app->session['activityCategory']; $i++) {
    ?>
            $('#cycle-template-category-hide<?= $i ?>').clone().appendTo('#cycle-template-category-show<?= $i ?>');
            activityCategory(<?= $i ?>);
            //            $('#cycle-template-category-hide<?= $i ?>').clone().appendTo('#cycle-template-category-show<?= $i ?>')
            //            $('#cycle-template-category-hide<?= $i ?>').clone().appendTo('#cycle-template-category-show<?= $i ?>')
            //            $('#cycle-template-category-hide<?= $i ?>').clone().appendTo('#cycle-template-category-show<?= $i ?>')
            //            $('#cycle-template-category-hide<?= $i ?>').clone().appendTo('#cycle-template-category-show<?= $i ?>')
            //            $('#cycle-template-category-hide<?= $i ?>').clone().appendTo('#cycle-template-category-show<?= $i ?>')
            //            $('#cycle-template-category-hide<?= $i ?>').clone().appendTo('#cycle-template-category-show<?= $i ?>')
            //            $('#cycle-template-category-hide<?= $i ?>').clone().appendTo('#cycle-template-category-show<?= $i ?>')
            //            $('#cycle-template-category-hide<?= $i ?>').clone().appendTo('#cycle-template-category-show<?= $i ?>')
            //            $('#cycle-template-category-hide<?= $i ?>').clone().appendTo('#cycle-template-category-show<?= $i ?>')
<?php } ?>

    });
    function chk(id) {
        $('#cycle-template-category-hide' + id).clone().appendTo('#cycle-template-category-show' + id);
//        duration(id);
        activityCategory(id);
        day(id);
        emphasis(id);
    }

//    $("form").on("click", ".add_employer", function (e) {
//        e.preventDefault();
//        $('#cycle-template-category-hide').clone().appendTo('#cycle-template-category-show');
//        duration();
//        $('input[name="CycleTemplates[duration][1]"]').rules("add", {
//            required: true
//        });


//    ?  counter += 1;
//    });
    function doRemove(arg, ids) {
        c = confirm('Are you sure?');
        if (c == true) {
            $(arg).parent().parent().parent().remove();
//            duration(ids);
            activityCategory(ids);
            day(ids);
            emphasis(ids);
        }
    }
//    function duration(ids) {
//        for (i = 0; i <= document.cycle.elements.length - 1; i++) {
//            eleName = document.cycle.elements[i].name;
//            if (eleName.indexOf("DurationANDActivityCategoryTemplates" + ids) == 0) {
//                //Give a dynamic id
//                document.cycle.elements[i].id = 'duration-templates' + i;
//                document.cycle.elements[i].name = 'DurationANDActivityCategoryTemplates' + ids + '[duration][' + i + ']';
//                $('#' + document.cycle.elements[i].id).rules("add", {
//                    required: true,
//                    digits: true,
//                });
//            }
//        }
//    }

    function day(ids) {
        for (i = 0; i <= document.cycle.elements.length - 1; i++) {
            eleName = document.cycle.elements[i].name;
            if (eleName.indexOf("DayTemplates") == 0) {
                //Give a dynamic id
                document.cycle.elements[i].id = 'day-templates' + i;
//                document.cycle.elements[i].name = 'DayTemplates' + i + '';
                $('#' + document.cycle.elements[i].id).rules("add", {
                    required: true,
//                    digits: true,
                });
            }
        }
    }

    function emphasis(ids) {
        for (i = 0; i <= document.cycle.elements.length - 1; i++) {
            eleName = document.cycle.elements[i].name;
            if (eleName.indexOf("EmphasisTemplates") == 0) {
                //Give a dynamic id
                document.cycle.elements[i].id = 'emphasis-templates' + i;
//                document.cycle.elements[i].name = 'EmphasisTemplates' + i;
                $('#' + document.cycle.elements[i].id).rules("add", {
                    required: true,
                });
            }
        }
    }

    function activityCategory(ids) {
        for (i = 0; i <= document.cycle.elements.length - 1; i++) {
            eleName = document.cycle.elements[i].name;
            if (eleName.indexOf("DurationANDActivityCategoryTemplates" + ids) == 0) {
                //Give a dynamic id
                document.cycle.elements[i].id = 'activity-category-templates' + i;
                if (i % 2 == 0) {
                    document.cycle.elements[i].name = 'DurationANDActivityCategoryTemplates' + ids + '[activity_category][' + i + ']';
                } else {
                    document.cycle.elements[i].name = 'DurationANDActivityCategoryTemplates' + ids + '[duration][' + i + ']';
                }
            }
        }
    }
    function newactivitycolor(select, divId) {
        var val = select.value;
        var ids = select.id
        $.ajax({
            url: '<?= Url::to(['cycle-templates/getcolor']) ?>&id=' + val,
            type: 'POST',
            success: function (data)
            {
                $('.' + ids + 'bg-color1').remove();
                $('#' + ids).parent().attr('style', 'margin-right:0px !important');
                $("#" + ids).parent().before("<div style='width:1.1% !important;margin-right:20px' class='col-md-1 pull-left " + ids + "bg-color1'><div style='background:" + data + ";height:30px;width:30px'></div></div>");
            },
            error: function (XMLHttpRequest, textStatus, errorThrown)
            {

            }
        });
        return false;
    }

    function continues() {
        var ids = $('#counter').val();
        for (i = 0; i <= document.cycle.elements.length - 1; i++) {
            eleName = document.cycle.elements[i].name;
            if (eleName.indexOf("DurationANDActivityCategoryTemplates" + ids) == 0) {
                //Give a dynamic id
                document.cycle.elements[i].id = 'activity-category-templates' + i;
                if (i % 2 == 0) {
                    document.cycle.elements[i].name = 'DurationANDActivityCategoryTemplates' + ids + '[activity_category][' + i + ']';
                } else {
                    document.cycle.elements[i].name = 'DurationANDActivityCategoryTemplates' + ids + '[duration][' + i + ']';
                }
                if ($('#' + document.cycle.elements[i].id).length) {
                    $('#' + document.cycle.elements[i].id).rules("add", {
                        required: true
                    });
                }
            }
        }
    }
</script>