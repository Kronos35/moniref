<?php  
use yii\helpers\Html;
use app\models\Consumptionregistry;
use app\assets\Charts;
use app\assets\Consumption;
use app\assets\ChartDateCalc;

	// El constructor de 'Consumption' pide 8 datos el primero siendo el cálculo que va a arrojar "consumo promedio" ("a") o consumo total ("s") para cada "apliance", los siguientes 3 componen la fecha inicial desde la cual se visualizará la información, los otros 3 parámetros la fecha 'tope' finalmente el tipo de dato que se obtendrá ya sea 'amps' (a), 'volts' (v) y 'wats' (w)
	
	
	// La función 'getData()' obtiene la información y la regresa para ser amacenada en una variable
    $consumptionWatts = new Consumption("a","2017","10","01","2017","10","31",'w','1');
    $consumptionVolts = new Consumption("a","2017","10","01","2017","10","31",'v', '1');
    $consumptionAmps = new Consumption("a","2017","10","01","2017","10","31",'a', '1');
    $datasetWatts=$consumptionWatts->getData(Yii::$app->user->id);
    $datasetVolts=$consumptionVolts->getData(Yii::$app->user->id);
    $datasetAmps=$consumptionAmps->getData(Yii::$app->user->id);
	
	// Este es un ejemplo de otra chart en la misma pantalla
	$charts2 = new Charts("charid2",$datasetWatts,"col-md-3",false);
	$charts2->setChartType($charts2->type[2]);
	$charts2->setChartTitle("Watts");
	$charts2->render();

	$charts3 = new Charts("charid3",$datasetVolts,"col-md-3",true);
	$charts3->setChartType($charts3->type[2]);
	// este metodo permite cambiar el nombre a la grafica
	$charts3->setChartTitle("Volts");
	$charts3->render();

	$charts4 = new Charts("charid4",$datasetAmps,"col-md-3",true);
	$charts4->setChartType($charts4->type[2]);
	$charts4->setChartTitle("Amp");
	$charts4->render();
?>
</div>

