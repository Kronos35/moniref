<?php  
use yii\helpers\Html;
use app\models\Consumptionregistry;
use app\assets\Charts;
use app\assets\Consumption;
use app\assets\ChartDateCalc;

	// El constructor de 'Consumption' pide 8 datos el primero siendo el cálculo que va a arrojar "consumo promedio" ("a") o consumo total ("s") para cada "apliance", los siguientes 3 componen la fecha inicial desde la cual se visualizará la información, los otros 3 parámetros la fecha 'tope' finalmente el tipo de dato que se obtendrá ya sea 'amps' (a), 'volts' (v) y 'wats' (w)
	
	
	// La función 'getData()' obtiene la información y la regresa para ser amacenada en una variable

	$startYear="";
	$startMonth="";
	$startDay="";
	$startDay="";
	$endYear="";
	$endMonth="";	
	$endDay="";
	$endDay="";
	$flag=1;

	foreach ($_GET as $key) {
		if(isset($key)){
			$flag*=1;
		}
		else{
			$flag*=0;
			echo "no";
		}
	}
	if ($flag==1) {
		$startYear=$_GET['startYear'];
		$startMonth=$_GET['startMonth'];
		$startDay=$_GET['startDay'];
		$endYear=$_GET['endYear'];
		$endMonth=$_GET['endMonth'];
		$endDay=$_GET['endDay'];
		$consumptionWatts = new Consumption("a",$startYear,"$startMonth","01","$endYear","$endMonth","$endDay",'w','1');
	    $datasetWatts=$consumptionWatts->getData(Yii::$app->user->id);
		$chart = new Charts("charid2",$datasetWatts,"col-md-6",false);
		//$chart->setChartType($chart->type[2]);
		$chart->setChartTitle("Watts");
		$chart->render();
	}	
?>
</div>

