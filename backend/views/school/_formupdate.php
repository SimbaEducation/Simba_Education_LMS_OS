<?php
/**
 * Summary Text
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\User;
use backend\models\UserType;
use backend\models\Segment;

/* @var $this yii\web\View */
/* @var $model backend\models\School */
/* @var $form yii\widgets\ActiveForm */

$template = \metronic\components\LayoutComponent::getFromTemplate();
$labelClass = \metronic\components\LayoutComponent::getFormLabelCssClass();
//echo $model->userSchools[0]->user_id;
if (isset($model->userSchools[0]->user_id)) {
    $model->school_manager = $model->userSchools[0]->user_id;
}
?>

<div class="portlet-body form">
    <div class="form-body">
        <div class="row">
            <?php
            $form = ActiveForm::begin([
                        'enableClientValidation' => false,
                        'enableAjaxValidation' => false,
                        'options' => ['enctype' => 'multipart/form-data']
                            ]
            );
            ?>
            <div class="col-lg-6">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 'status')->dropdownList(['' => 'Select', '1' => 'Active', '0' => 'Inactive'],['class' => 'form-control bs-select']) /* , ['prompt' => 'Select Data'] */ ?>
                <?= $form->field($model, 'segment_id')->dropDownList(ArrayHelper::map(segment::find()->all(), 'id', 'name'), ['onchange' => 'display(this.value);', 'prompt' => 'Select', 'class' => 'form-control bs-select']) ?>
                <?= $form->field($model, 'max_number_of_students')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'max_number_of_teachers')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'school_logo')->fileInput() ?>
                <div>
                    <?php echo Html::img(Yii::getAlias('@web') . '/../uploads/school/' . $model['school_logo'], ['width' => '70px']) ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="control-label">Select User</label>
                    <div class="radio-list">
                        <label class="radio-inline">
                            <div class="radio" id="uniform-optionsRadios1">
                                <input type="radio" <?php
                                echo isset($_POST['userSelection']) && $_POST['userSelection'] == 'new' ? 'checked=checked;' : '';
                                ?> value="new" id="optionsRadios1" name="userSelection">
                            </div> New
                        </label>
                        <label class="radio-inline">
                            <div class="radio" id="uniform-optionsRadios2">
                                <input type="radio" <?php
                                if (!isset($model->userSchools[0]->user_id)) {
                                    echo isset($_POST['userSelection']) && $_POST['userSelection'] == 'existing' ? 'checked=checked;' : '';
                                } else {
                                    echo 'checked=checked';
                                }
                                ?> value="existing" id="optionsRadios2" name="userSelection">
                            </div> Existing </label>
                    </div>
                </div>
                <div id="newUser" style="<?php
                echo isset($_POST['userSelection']) && $_POST['userSelection'] == 'new' ? 'display: inline;' : 'display: none;';
                ?>">

                    <?= $form->field($user, 'username')->textInput(['maxlength' => 255]) ?>

                    <?= $form->field($user, 'email')->textInput(['maxlength' => 255]) ?>

                    <?= $form->field($user, 'password')->passwordInput(['maxlength' => 250]) ?>

                    <?= $form->field($user, 'first_name')->textInput(['maxlength' => 255]) ?>

                    <?= $form->field($user, 'last_name')->textInput(['maxlength' => 255]) ?>

                    <?= $form->field($user, 'about')->textarea(['rows' => 6]) ?>

                </div>
                <div id="existingUser" style="
                <?php
                if (!isset($model->userSchools[0]->user_id)) {
                    echo isset($_POST['userSelection']) && $_POST['userSelection'] == 'existing' ? 'display: inline;' : 'display: none;';
                } else {
                    echo 'display: inline;';
                }
                ?>
                     ">
                         <?= $form->field($model, 'school_manager')->dropDownList(ArrayHelper::map(User::find()->all(), 'id', 'username'), ['onchange' => 'display(this.value);', 'prompt' => 'Select', 'class' => 'form-control bs-select']) ?>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="form-actions" style="background-color: #f5f5f5;margin: 0;padding: 20px 10px;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-offset-5 col-md-6">
                                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => 'btn btn-success']) ?>
                            </div>
                        </div>
                    </div>
                    <div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->registerJs("
jQuery(document).ready(function() { 
     $('.js-example-basic-single').select2();
});

   $('input[name=userSelection]:radio').click(function () {   
            var selection = $('input[name=userSelection]:radio:checked').val();
           
            if(selection == 'existing')
            {
                $('#existingUser').show();
                $('#newUser').hide();                   
            }
            else if(selection == 'new'){ 
                $('#newUser').show();
                $('#existingUser').hide();
            }
        });

");
?>