<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use app\models\Categoria;
use app\models\Wsite;

use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Wsite */

//$this->title = $model->idsite;
$this->params['breadcrumbs'][] = ['label' => 'Wsites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wsite-view">

        <?= Html::a('Volver', ['index'], ['class' => 'btn btn-success']) ?>

    <?php Modal::begin([
            'header' => '<h2>Llave secreta</h2>',
            'toggleButton' => [
                'label' => 'Ver contrasenas',
                'class'=>'btn btn-success'],
        ]);
        echo $this->render('_mihash', ['model' => new Wsite(),'id' => $model->idsite]) ;
        Modal::end() ?>  

        <?= Html::a('Eliminar', ['delete', 'id' => $model->idsite], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro de eliminar el regitro?',
                'method' => 'post',
            ],
        ]) ?>
n
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'idsite',
            'url:url',
            'nom_site',
            'nom_user',
            'pass_user',
            'notas',
            [
                'attribute'=>'idcategoria',
                'value'=> function($model){
                    $idcategoria = Categoria::findOne($model->idcategoria);
                    return $idcategoria->categoria;
                },
            ],            
           // 'idusuario',
        ],
    ]) ?>

</div>
