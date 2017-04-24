<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Categoria */

//$this->title = 'Nueva Categoria';
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-create">

    <?php $form = ActiveForm::begin([
        "method" => "post",
         "action" => Url::toRoute("categoria/create"),
        "enableClientValidation" => true,
        ]);
    ?>

    <?= $form->field($model, 'categoria')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    </div>

    <?php ActiveForm::end(); ?>

</div>
