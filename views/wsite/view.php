<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Wsite */

//$this->title = $model->idsite;
$this->params['breadcrumbs'][] = ['label' => 'Wsites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wsite-view">

   <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Volver', ['index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Actualizar', ['update', 'id' => $model->idsite], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->idsite], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro de eliminar el regitro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idsite',
            'url:url',
            'nom_site',
            'nom_user',
            'pass_user',
            'notas',
            'idcategoria',
            'idusuario',
        ],
    ]) ?>

</div>
