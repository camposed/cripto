<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\password\PasswordInput;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Registro de Usuario';

$fieldOptions = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
];

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];

$fieldOptions3 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span></span>"
];
?>

<div class="login-box">
    <div class="col-xs-12">
        <?php if(Yii::$app->session->hasFlash('registro_error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= Yii::$app->session->getFlash('registro_error') ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="login-logo">
        <a href="#"><b>Cripto Web</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">

        <?php $form = ActiveForm::begin(['id' => 'registro-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'nombre', $fieldOptions)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('Nombre')]) ?>

        <?= $form
            ->field($model, 'apellido', $fieldOptions)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('Apellido')]) ?>

       	<?= $form
            ->field($model, 'email', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('Email')]) ?>

        <?= $form
            ->field($model, 'password', $fieldOptions3)
            ->label(false)
            ->widget(PasswordInput::classname(), ['options' => ['placeholder' => 'Contraseña']]) ?>

        <?= $form
            ->field($model, 'password_repetir', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => 'Repetir Contraseña']) ?>

      	<?= $form
            ->field($model, 'frase_clave', $fieldOptions2)
            ->label(false)
            ->hiddenInput(['placeholder' => $model->getAttributeLabel('Clave Maestra')]) ?>

        <div class="row">
            <!-- /.col -->
            <div class="col-xs-12">
                <?= Html::submitButton('Registrarse', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'registro-button']) ?>
            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div style="text-align:center;margin-top: 5px;">
                <?= Html::a("Ingresar", Url::to(['/site/login'])) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
