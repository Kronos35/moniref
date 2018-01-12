<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Consumptionregistry;
use app\models\Apliance;
use app\models\ProtoHasApliance;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionPruebasmarco()
    {
        return $this->render('pruebasmarco');
    }
    public function actionPruebaskarla(){
        if(isset($_GET['watt'],$_GET['amp'],$_GET['volt'])){
            $asd = ProtoHasApliance::findOne(['disconnectionDate' => null]);

            $app = Apliance::findOne(["idApliance"=>$asd["apliance_idApliance"]]);
            $model = new Consumptionregistry();
            $model->apliance_idApliance = $app->idApliance;
            $model->watts = $_GET['watt'];
            $model->amps = $_GET['amp'];
            $model->volts = $_GET['volt'];
            if($model->save()){
                echo "Guardado";
            }
            else{
                print_r($model);
            }
        }
        else{
            foreach(Consumptionregistry::find()->where(["apliance_idApliance"=>23])->all() as $model){
                echo "watt: " . $model->watts  . " amps: " . $model->amps . " volts:" . $model->volts . "<br>";
            }
        }
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    /***Custom views***/
    public function actionCharts($message=null){
        return $this->render('charts',["message"=>$message]);
    }
    public function actionChartdisplay(){
        return $this->render("chartdisplay");
    }
    
    public function actionFormulario($mensaje = null)
    {
        return $this->render("formulario", ["mensaje" => $mensaje]);
    }
    
    public function actionRequest()
    {
        $mensaje = null;
        if (isset($_REQUEST["nombre"]))
        {
            $mensaje = "Bien, has enviando tu nombre correctamente: " . $_REQUEST["nombre"];
        }
        $this->redirect(["site/formulario", "mensaje" => $mensaje]);
    }

    public function actionValidarformulario(){
        
    }
}
