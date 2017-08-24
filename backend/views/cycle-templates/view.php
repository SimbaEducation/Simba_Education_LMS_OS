<?php
/**
 * Summary Text
 */
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CycleTemplates */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = ['label' => 'Cycle Templates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption font-green-sharp">
            <i class="icon-tag font-green-sharp"></i>
            <span class="caption-subject bold uppercase">Cycle Templates</span>
            <span class="caption-helper">view in your application</span>
        </div>
        <div class="actions">
            <a href="<?= Yii::$app->getUrlManager()->createUrl(['cycle-templates/update', 'id' => $model->id]) ?>" class="btn btn-default btn-circle">
                <i class="fa fa-plus"></i>
                <span class="hidden-480">
                    Update </span>
            </a>
        </div>
    </div>
    <div class="portlet-body">
        <div class="user-create">
            <div class="table-scrollable">
                <table class="table table-hover">
                    <tr>
                        <td align="center" colspan="6"><h4 style="font-weight:bold"><?= $model->name ?></h4></td>
                    </tr>
                    <tr>
                        <?php
                        foreach ($model->cycleTemplateDays AS $val) {
                            ?>

                            <td>
                                <table class="table table-hover">
                                    <tr>
                                        <th style="text-align:center"><?= $val->name ?></th>
                                    <tr>
                                    <tr>
                                        <th><?= $val->emphasis ?></th>
                                    <tr>
                                        <?php foreach ($val->cycleTemplateDaysCategories AS $cat) { ?>    
                                        <tr>
                                            <td style="color:white;font-weight:" bgcolor="<?= $cat->activityCategory->color_code ?>">
                                                <label class="label label-sm label-primary pull-left"><?= $cat->activityCategory->name ?></label> 
                                                <label class="label label-sm label-success pull-right"><?= $cat->duration ?> Mins</label>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </table>
                            </td>

                            <?php
                        }
                        ?>
                    </tr>
                </table>
            </div>


        </div>
    </div>
</div>

