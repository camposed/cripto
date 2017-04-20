<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


use conquer\select2\Select2Widget;
use yii\helpers\ArrayHelper;
use app\models\Categoria;

/* @var $this yii\web\View */
/* @var $model app\models\Wsite */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wsite-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nom_site')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nom_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pass_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'notas')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'idcategoria')->textInput() ?> -->
    <?= $form->field($model, 'idcategoria')->widget(
        Select2Widget::className(),
        [
            'items'=>ArrayHelper::map(Categoria::find()->all(), 'idcategoria', 'categoria')
        ]
    ); ?>
    <!-- <?= $form->field($model, 'idusuario')->textInput() ?>  -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
