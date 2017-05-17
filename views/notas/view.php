<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use yii\bootstrap\Modal;

use app\util\Aes;
use app\models\Notas;

/* @var $this yii\web\View */
/* @var $model app\models\Notas */

//$this->title = $model->idnota;
$this->params['breadcrumbs'][] = ['label' => 'Notas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="notas-view">

    <?= Html::a('Volver', ['index'], ['class' => 'btn btn-success']) ?>

    <?php Modal::begin([
            'header' => '<h2>Llave secreta</h2>',
            'toggleButton' => [
                'label' => 'Ver nota',
                'class'=>'btn btn-success'],
        ]);
        echo $this->render('_mihash', ['model' => new Notas(),'id' => $model->idnota]) ;
        Modal::end() ?>  

    <?= Html::a('Eliminar', ['delete', 'id' => $model->idnota], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
        ],
    ]) ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          //  'idnota',
            'titulo',
            'nota:ntext',
           // 'idusuario',
        ],
    ]) ?>

</div>
