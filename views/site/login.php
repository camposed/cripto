<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Ingresar';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<div class="login-box">
    <div class="col-xs-12">
        <?php if(Yii::$app->session->hasFlash('registro_exito')): ?>
            <div class="alert alert-success" role="alert">
                <?= Yii::$app->session->getFlash('registro_exito') ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="login-logo">
        <a href="#"><b>Cripto Web</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'email', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('Email')]) ?>

        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('Password')]) ?>        

        <div class="row">
            <div class="col-xs-8">
                <?= $form->field($model, 'rememberMe')->label("Permanecer conectado")->checkbox() ?>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <?= Html::submitButton('Ingresar', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>            
            <!-- /.col -->
        </div>
        <div class="row">
            <div style="text-align:center;">
                <?= Html::a("Registrarse", Url::to(['/site/registro'])) ?>
            </div>
            <div style="text-align:center;">
                <?= Html::a("Recuperar mi contraseña.", Url::to(['/site/contact'])) ?>
            </div>            
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
