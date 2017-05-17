<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

use app\util\Aes;
use app\models\Notas;

/* @var $this yii\web\View */
/* @var $model app\models\Solicitud */
?> 


<?php $form = ActiveForm::begin([
                            "method" => "post",
                            "action" =>  Url::toRoute('notas/desencriptar')
                        ]);
?>

<input type="hidden" id='id' name="id" value="<?=$id?>">
<input type="text" id="hash" class="form-control" name="hash" title="Se necesita su llave secreta" placeholder="Llave secreta" required>

<br>

<button type="submit" class="btn btn-success">Ver texto</button>                 
<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

<?php $form->end() ?>

