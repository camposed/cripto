<?php

namespace app\controllers;

use Yii;
use app\models\Wsite;
use app\models\WsiteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use conquer\select2\Select2Action;

use app\util\Aes;

/**
 * WsiteController implements the CRUD actions for Wsite model.
 */
class WsiteController extends Controller
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
     * Lists all Wsite models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WsiteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['idusuario'=>Yii::$app->user->identity->id]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Wsite model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionDesencriptar(){
            
            $hash = hash('md5',trim($_POST['hash']));

            $model = new Wsite();

            $registro = Wsite::find()
                ->select('*')
                ->where(['idsite' =>$_POST['id']])
                ->one();

            foreach ($registro as $clave => $valor) {
                   //echo "Clave: $clave; Valor: $valor<br />\n";
                  $model->$clave = $valor;

                switch ($clave) {
                    case 'nom_user':
                        $model->$clave = Aes::fnDecrypt($valor, $hash ); 
                        break;
                    case 'pass_user':
                       $model->$clave = Aes::fnDecrypt($valor, $hash ); 
                        break;
                    case 'notas':
                        $model->$clave = Aes::fnDecrypt($valor, $hash ); 
                        break;
                }

            }

            return $this->render('view', [
                    'model' => $model,
                ]);

    }
    /**
     * Creates a new Wsite model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
 
        $hash = hash('md5',trim($_POST['hash']));

        $model = new Wsite();
        $model->url = $_POST['Wsite']['url'];
        $model->nom_site = $_POST['Wsite']['nom_site'];
        $model->nom_user = Aes::fnEncrypt($_POST['Wsite']['nom_user'],trim($hash));
        $model->pass_user= Aes::fnEncrypt($_POST['Wsite']['pass_user'],trim($hash));
        $model->notas = Aes::fnEncrypt($_POST['Wsite']['notas'],trim($hash));
        $model->idcategoria = $_POST['Wsite']['idcategoria'];
        $model->idusuario = Yii::$app->user->identity->id;
        $model->save();



        if ($model->save()) {
            return $this->redirect(['view', 'id' => $model->idsite]);
            //return $this->actionIndex();
        } else {
            //return $model->getErrors();
           return $this->render('create', [
                'model' => $model,
            ]);
        }

        
    }

    /**
     * Updates an existing Wsite model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idsite]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Wsite model.
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
     * Finds the Wsite model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Wsite the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Wsite::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
