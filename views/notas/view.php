<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use yii\bootstrap\Modal;

use app\util\Aes;


/* @var $this yii\web\View */
/* @var $model app\models\Notas */

//$this->title = $model->idnota;
$this->params['breadcrumbs'][] = ['label' => 'Notas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

    $hash = hash('md5','cosita bonita');

?>
<div class="notas-view">

    <p>
        <?= Html::a('Volver', ['index'], ['class' => 'btn btn-success']) ?>
 
        <?= Html::a('Ver Nota', ['desencriptar', 'id' => $model->idnota], ['class' => 'btn btn-primary']) ?> 

        <?= Html::a('Eliminar', ['delete', 'id' => $model->idnota], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

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
