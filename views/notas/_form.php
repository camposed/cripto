<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Notas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="notas-form">

    <?php $form = ActiveForm::begin([
        "method" => "post",
        "enableClientValidation" => true,
        ]);
    ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nota')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    </div>

    <?php ActiveForm::end(); ?>

</div>
