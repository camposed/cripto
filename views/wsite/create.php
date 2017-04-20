<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Wsite */

$this->title = 'Create Wsite';
$this->params['breadcrumbs'][] = ['label' => 'Wsites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wsite-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
