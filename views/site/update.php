<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Site */

$this->title = 'Update Site: ' . $model->idsite;
$this->params['breadcrumbs'][] = ['label' => 'Sites', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idsite, 'url' => ['view', 'id' => $model->idsite]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="site-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
