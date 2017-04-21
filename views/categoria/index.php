<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\bootstrap\Modal;
use app\models\Categoria;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Categorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-index">

    <p>

    <?php
            Modal::begin([
                'header' => '<h2>Nueva categoria</h2>',
                'toggleButton' => [
                    'label' => 'Nuevo',
                    'class'=>'btn btn-success'],
            ]);
            echo $this->render('create', ['model' => new Categoria()]) ;
            Modal::end();  
    ?>

    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'categoria',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
