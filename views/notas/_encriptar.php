<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

use app\util\Aes;

/* @var $this yii\web\View */
/* @var $model app\models\Solicitud */
?> 

<?php $form = ActiveForm::begin([
                            "method" => "post",
                            "action" => Url::toRoute("notas/encriptar"),
                            "enableClientValidation" => true,
                        ]);
$hash = hash('md5','cosita bonita');

?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'nota')->textarea(['rows' => 6]) ?>

    <input type="text" id="hash" class="form-control" name="hash" title="Se necesita su llave secreta" placeholder="Llave secreta" required>

    <br>
    
<?= Html::submitButton("Guardar", ["class" => "btn btn-success"]) ?>
                
<?php $form->end() ?>