<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="log-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idlog') ?>

    <?= $form->field($model, 'idusuario') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'os') ?>

    <?= $form->field($model, 'nombre_host') ?>

    <?php // echo $form->field($model, 'tipo_maquina') ?>

    <?php // echo $form->field($model, 'version') ?>

    <?php // echo $form->field($model, 'ip') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
