<?php

namespace app\controllers;

use Yii;
use app\models\Notas;
use app\models\NotasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\util\Aes;
use yii\db\Query;
/**
 * NotasController implements the CRUD actions for Notas model.
 */
class NotasController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Notas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NotasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Notas model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Notas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {        

        $model = new Notas();
        $model->idusuario=1;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idnota]);
            //return $this->actionIndex();
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionEncriptar(){
         
         $hash = hash('md5',trim($_POST['hash']));

         $model = new Notas();
      
         $model->titulo=$_POST['Notas']['titulo'];
         $nota = trim($_POST['Notas']['nota']);
         $model->nota = Aes::fnEncrypt($nota,trim($hash));

         $model->idusuario=1;

         $model->save();

        if ($model->save()) {
            return $this->redirect(['view', 'id' => $model->idnota]);
            //return $this->actionIndex();
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }         
    }

    public function actionDesencriptar(){

        $hash = hash('md5',trim($_POST['hash']));

        $model = new Notas();

        $registro = Notas::find()
            ->select('*')
            ->where(['idnota' =>$_POST['id']])
            ->one();

        foreach ($registro as $clave => $valor) {
               //echo "Clave: $clave; Valor: $valor<br />\n";
              $model->$clave = $valor;
              if($clave=='nota'){
                   $model->$clave = Aes::fnDecrypt($valor, $hash ); 
              }
        }

            return $this->render('view', [
                'model' => $model,
            ]);
            
    }

    /**
     * Updates an existing Notas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idnota]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Notas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Notas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Notas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Notas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
