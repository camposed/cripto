<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WsiteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wsite-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idsite') ?>

    <?= $form->field($model, 'url') ?>

    <?= $form->field($model, 'nom_site') ?>

    <?= $form->field($model, 'nom_user') ?>

    <?= $form->field($model, 'pass_user') ?>

    <?php // echo $form->field($model, 'notas') ?>

    <?php // echo $form->field($model, 'idcategoria') ?>

    <?php // echo $form->field($model, 'idusuario') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
