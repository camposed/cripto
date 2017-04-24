<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Categoria */

//$this->title = 'Actualizar Categoria: ' . $model->idcategoria;
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idcategoria, 'url' => ['view', 'id' => $model->idcategoria]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="categoria-update">

    <?php $form = ActiveForm::begin([
        "method" => "post",
         "action" => Url::toRoute(['categoria/update', 'id' => $model->idcategoria]),
        "enableClientValidation" => true,
        ]);
    ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
