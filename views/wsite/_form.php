<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

use conquer\select2\Select2Widget;
use yii\helpers\ArrayHelper;
use app\models\Categoria;

use kartik\password\PasswordInput;
use app\util\Aes;

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

    <?= $form->field($model, 'pass_user')->widget(PasswordInput::classname(), [
        'pluginOptions' => [
            'showMeter' => true,
            'toggleMask' => true
    ]]); ?>

    <?= $form->field($model, 'notas')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'idcategoria')->widget(
        Select2Widget::className(),
        [
            'items'=>ArrayHelper::map(Categoria::find()->all(), 'idcategoria', 'categoria')
        ]
    ); ?>

<input type="text" id="hash" class="form-control" name="hash" title="Se necesita su llave secreta" placeholder="Llave secreta" required>
<br>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    </div>

    <?php ActiveForm::end(); ?>

</div>
