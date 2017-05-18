<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\helpers\Url;
use yii\bootstrap\Modal;
use app\models\Wsite;
use app\models\Categoria;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WsiteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mis contraseñas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wsite-index">

    <p>
       <!--  <?= Html::a('Nuevo registro', ['create'], ['class' => 'btn btn-success']) ?>  -->
    <?php
            Modal::begin([
                'header' => '<h2>Nuevo registro</h2>',
                'toggleButton' => [
                    'label' => 'Nuevo',
                    'class'=>'btn btn-success'],
            ]);
            echo $this->render('create', ['model' => new Wsite()]) ;
            Modal::end();  
    ?>

    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
         //   ['class' => 'yii\grid\SerialColumn'],

           // 'idsite',
           // 'url:url',
            'nom_site',
           // 'nom_user',
            //'pass_user',
            // 'notas',
            [
                'attribute'=>'idcategoria',
                'value'=> function($model){
                    $idcategoria = Categoria::findOne($model->idcategoria);
                    return $idcategoria->categoria;
                },
            ],  
            // 'idusuario',
            ['class' => 'yii\grid\ActionColumn','template' => '{view}{delete}'],
        ],
    ]); ?>
</div>
