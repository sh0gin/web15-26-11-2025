<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use app\models\DocType;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">  
            <?= Html::hiddenInput('имя_поля', DocType::getIdDocument("Паспорт гражданина РФ"), ['class' => 'hidden_input']);  ?> 
            <?php $form = ActiveForm::begin([
                'id' => 'register-form',
            ]); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::class, [
                'mask' => '+99999999999',
            ]) ?>

            <?= $form->field($passport, 'passport_type_id')->dropDownList(DocType::getTitle(), ['prompt' => "Выберите документ"]) ?>

            <?= $form->field($passport, 'passport_another', ['options' => ['class' => 'd-none']]) ?>
            <?= $form->field($passport, 'passport_expire')->textInput(['type' => "date"]) ?>

            <?= $form->field($passport, 'passport_number')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'password_repeat')->passwordInput() ?>

            <?= $form->field($model, 'rules')->checkbox([
                'template' => "<div class=\"custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
            ]) ?>

            <div class="form-group">
                <div>
                    <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>


        </div>
    </div>
</div>

<?php

$this->registerJsFile(
    'js/register.js',
    ['depends' => [yii\web\JqueryAsset::class]]
);
