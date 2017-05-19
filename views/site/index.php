<?php
use yii\helpers\Html;
use app\util\Aes;
/* @var $this yii\web\View */
$this->title = '';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Bienvenido!</h1>

        <p class="lead">Un lugar donde puedes almacenar tus contreseñas.</p>

    </div>

    <div class="body-content">
        <p class="lead">Utiliza una sola frase para encriptar tus contraseñas y tus apuntes. Por seguridad esta frase no la guardanos en nuestra base de datos.</p>

        <p class="lead">Una frase te será mas facil de recordar, que una contraseña. Ej. <?= Aes::generaPass()?></p>

   <div class="row">
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-number">Mis contraseñas</span>
              <span class="info-box-number">Tu tiendes <?=Aes::countWsite(Yii::$app->user->identity->id) ?> registros</span>
              <?= Html::a('Consultar', ['wsite/index'], ['class' => 'btn btn-primary']) ?>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-number">Mis notas</span>
              <span class="info-box-number">Tu tienes <?=Aes::countNotas(Yii::$app->user->identity->id) ?> registros</span>
              <?= Html::a('Consultar', ['notas/index'], ['class' => 'btn btn-primary']) ?>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

</div>

</div>