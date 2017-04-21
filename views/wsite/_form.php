<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

use conquer\select2\Select2Widget;
use yii\helpers\ArrayHelper;
use app\models\Categoria;

/* @var $this yii\web\View */
/* @var $model app\models\Wsite */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wsite-form">

    <?php $form = ActiveForm::begin([
        "method" => "post",
        "action" => Url::toRoute("wsite/create"),
        "enableClientValidation" => true,
        ]);
    ?>
  
    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nom_site')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nom_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pass_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'notas')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'idcategoria')->widget(
        Select2Widget::className(),
        [
            'items'=>ArrayHelper::map(Categoria::find()->all(), 'idcategoria', 'categoria')
        ]
    ); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Volver', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
