<?php

namespace app\controllers;

use Yii;
use app\models\Apliance;
use app\models\Proto;
use app\models\ProtoHasApliance;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AplianceController implements the CRUD actions for Apliance model.
 */
class AplianceController extends Controller
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
     * Lists all Apliance models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Apliance::find(["user_idUser"=>Yii::$app->user->id]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Apliance model.
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
     * Creates a new Apliance model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id){
        $model = new Apliance();
        if($model->load(Yii::$app->request->post())){
            $model->user_idUser = Yii::$app->user->id;
            if ($model->save()) {
                // YOLO //
                $this->update_create($id,$model->idApliance);
                return $this->redirect(['/proto/view', 'id' => $id]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function update_create( $proto, $apliance){
        //desconectar otro apliance //
        $models = ProtoHasApliance::find(["Proto_idProto"=>$proto])->where(["disconnectionDate"=>null])->all();
        foreach ($models as $model) {
            $model->disconnectionDate = date("Y-m-d");
            $model->save();
        }

        // buscando si existe //
        $existe = ProtoHasApliance::findOne(["Proto_idProto"=>$proto, "apliance_idApliance"=>$apliance]);

        if($existe){
            $existe->disconnectionDate = null;
            $existe->connectionDate = date("Y-m-d");
            $existe->save();
        }
        else{ //si no existe, lo crea //
            $nuevo = new ProtoHasApliance();
            $nuevo->connectionDate = date("Y-m-d");
            $nuevo->apliance_idApliance = $apliance;
            $nuevo->Proto_idProto = $proto;
            $nuevo->save();
        }
    }

    /**
     * Updates an existing Apliance model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idApliance]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Apliance model.
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
     * Finds the Apliance model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Apliance the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Apliance::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
