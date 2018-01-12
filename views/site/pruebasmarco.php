<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Consumptionregistry;
use app\models\Apliance;
use app\assets\Charts;
use app\assets\Consumption;
use app\assets\ChartDateCalc;

$this->title = 'Pruebas Marco';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?php echo $this->title; ?></h1>

<?php
	$busqueda = ["tipo1"=>"dispositivo","tipo2"=>"total"];

	$data = "";

	if(isset($_GET['tipo']) && $_GET['tipo']==$busqueda['tipo1']){
		$data = Consumptionregistry::find(["apliance_idApliance"=>$_GET['id']])->all();
	}
	else{
		$data = Consumptionregistry::find()->all();
	}

	URL("www.google.com/?data="+data+"&watts="+String(watts)+"&amps="+String(amps));

	$tipo = ["watts","amps","volts","costo"];
	

	$apps = Apliance::find(["user_idUser"=>Yii::$app->user->id])->all();
	$aproved = "";
	$x =0;

	foreach ($data as $model) {
		foreach ($apps as $app) {
			if($model->apliance_idApliance == $app->idApliance){
				$x++;
				$aproved[$x] = $model;
			}
		}
	}

	foreach ($aproved as $master) {
		echo $master->amps . "<br>";
	}
?>