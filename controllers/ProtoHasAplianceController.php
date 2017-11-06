<?php

namespace app\controllers;

use Yii;
use app\models\ProtoHasApliance;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProtoHasAplianceController implements the CRUD actions for ProtoHasApliance model.
 */
class ProtoHasAplianceController extends Controller
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
     * Lists all ProtoHasApliance models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ProtoHasApliance::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProtoHasApliance model.
     * @param integer $Proto_idProto
     * @param integer $apliance_idApliance
     * @return mixed
     */
    public function actionView($Proto_idProto, $apliance_idApliance)
    {
        return $this->render('view', [
            'model' => $this->findModel($Proto_idProto, $apliance_idApliance),
        ]);
    }

    /**
     * Creates a new ProtoHasApliance model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id){
        $model = new ProtoHasApliance();
        
        if ($model->load(Yii::$app->request->post())){
            if($this->update_create($id,$model->apliance_idApliance)){
                return $this->redirect(['/proto/view', 'id' => $id]);
            }
        }
        return $this->render('create', ['model' => $model,]);
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
            return $existe->save();
        }
        else{ //si no existe, lo crea //
            $nuevo = new ProtoHasApliance();
            $nuevo->connectionDate = date("Y-m-d");
            $nuevo->apliance_idApliance = $apliance;
            $nuevo->Proto_idProto = $proto;
            return $nuevo->save();
        }
    }

    /**
     * Updates an existing ProtoHasApliance model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Proto_idProto
     * @param integer $apliance_idApliance
     * @return mixed
     */
    public function actionUpdate($Proto_idProto, $apliance_idApliance)
    {
        $model = $this->findModel($Proto_idProto, $apliance_idApliance);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Proto_idProto' => $model->Proto_idProto, 'apliance_idApliance' => $model->apliance_idApliance]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ProtoHasApliance model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Proto_idProto
     * @param integer $apliance_idApliance
     * @return mixed
     */
    public function actionDelete($Proto_idProto, $apliance_idApliance)
    {
        $this->findModel($Proto_idProto, $apliance_idApliance)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProtoHasApliance model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Proto_idProto
     * @param integer $apliance_idApliance
     * @return ProtoHasApliance the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Proto_idProto, $apliance_idApliance)
    {
        if (($model = ProtoHasApliance::findOne(['Proto_idProto' => $Proto_idProto, 'apliance_idApliance' => $apliance_idApliance])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
