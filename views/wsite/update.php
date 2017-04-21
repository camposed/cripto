<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Wsite */

//$this->params['breadcrumbs'][] = ['label' => 'Wsites', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idsite, 'url' => ['view', 'id' => $model->idsite]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="wsite-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
