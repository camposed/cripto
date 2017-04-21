<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Wsite;

/* @var $this yii\web\View */
/* @var $model app\models\Wsite */

//$this->title = 'Crear nuevo registro';
$this->params['breadcrumbs'][] = ['label' => 'Wsites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wsite-create">

   <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
