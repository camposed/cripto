<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use yii\bootstrap\Modal;
use app\models\Usuario;
/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

//$this->title = $model->idusuario;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-view">

   <h1>Mi perfil</h1>  

    <p>
    <?php
            Modal::begin([
                'header' => '<h2>Editar</h2>',
                'toggleButton' => [
                    'label' => 'Editar',
                    'class'=>'btn btn-success'],
            ]);
            echo $this->render('update', ['model' => $model,  'id' => $model->idusuario]) ;
            Modal::end();  
    ?>  

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'idusuario',
            'nombre',
            'apellido',
            'email:email',
            'pass',
           // 'activo',
           // 'intentos',
        ],
    ]) ?>

</div>
