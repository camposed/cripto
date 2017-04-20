<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Historial de acceso';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'fecha',
            'os',
            'nombre_host',
            ['class' => 'yii\grid\ActionColumn','template' => '{view}'],
        ],
    ]); ?>
</div>
