<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\Consumptionregistry;
use app\assets\Charts;
use app\assets\Consumption;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php 
?>

<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
    	<p>
    	    This is the About page. You may modify the following file to customize its content:
    	</p>

    	<code><?= __FILE__ ?></code>
    </div>
</div>
<div class="row">
	

<?php 
	// El constructor de 'Consumption' pide 8 datos el primero siendo el cálculo que va a arrojar "consumo promedio" ("a") o consumo total ("s") para cada "apliance", los siguientes 3 componen la fecha inicial desde la cual se visualizará la información, los otros 3 parámetros la fecha 'tope' finalmente el tipo de dato que se obtendrá ya sea 'amps' (a), 'volts' (v) y 'wats' (w)
	
	// La función 'getData()' obtiene la información y la regresa para ser amacenada en una variable
    $consumptionWatts = new Consumption("a","2017","10","01","2017","10","31",'w');
    $consumptionVolts = new Consumption("a","2017","10","01","2017","10","31",'v');
    $consumptionAmps = new Consumption("a","2017","10","01","2017","10","31",'a');
    $datasetWatts=$consumptionWatts->getData();
    $datasetVolts=$consumptionVolts->getData();
    $datasetAmps=$consumptionAmps->getData();
	
	// clase de charts //
	// requiere llamar esto: "use app\assets\Charts;" //

	// el constructor de charts pide $string(id del chart), (array(clave=>valor)) de datos, $string parametros (aquí va el col-md-5 o esas weas) y finalmente un bool random o no random (true = random)
	//$charts = new Charts("charid",$dataset,"col-md-3",false);
	// metodo que permite cambiar el tipo de grafica, si no se usa por defecto es el de dona
	//$charts->setChartType($charts->type[0]);
	// metodo que permite ordenar los datos de menor a mayor
	//$charts->sortData();
	// se usa el metodo render para mostrar el chart
	//$charts->render();

	// Este es un ejemplo de otra chart en la misma pantalla
	$charts2 = new Charts("charid2",$datasetWatts,"col-md-3",false);
	$charts2->setChartType($charts2->type[1]);
	$charts2->render();

	$charts3 = new Charts("charid3",$datasetVolts,"col-md-3",true);
	$charts3->setChartType($charts3->type[2]);
	// este metodo permite cambiar el nombre a la grafica
	$charts3->setChartTitle("Mi graficota");
	$charts3->render();

	$charts4 = new Charts("charid4",$datasetAmps,"col-md-3",true);
	$charts4->setChartType($charts4->type[3]);
	$charts4->render();

?>
</div>

<div class="row">
	<?php
		$charts5 = new Charts("charid5",$datasetWatts,"col-md-3",true);
		$charts5->setChartType($charts5->type[4]);
		$charts5->render();

		$charts6 = new Charts("charid6",$datasetAmps,"col-md-3",true);
		$charts6->setChartType($charts5->type[5]);
		$charts6->render();
	?>
	
</div>