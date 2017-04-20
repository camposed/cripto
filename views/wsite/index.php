<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WsiteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mis contraseñas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wsite-index">

   <!--  <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
         <?= Html::a('Nuevo registro', ['create'], ['class' => 'btn btn-success']) ?> 
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
         //   ['class' => 'yii\grid\SerialColumn'],

           // 'idsite',
           // 'url:url',
            'nom_site',
           // 'nom_user',
            //'pass_user',
            // 'notas',
            // 'idcategoria',
            // 'idusuario',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
