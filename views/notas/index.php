<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\bootstrap\Modal;
use app\models\Notas;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NotasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Notas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notas-index">
    <p>
    <?php
            Modal::begin([
                'header' => '<h2>Nueva nota</h2>',
                'toggleButton' => [
                    'label' => 'Nueva nota',
                    'class'=>'btn btn-success'],
            ]);
            echo $this->render('_encriptar', ['model' => new Notas()]) ;
            Modal::end();  
    ?>        
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
             'titulo',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
