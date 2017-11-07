<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\Consumptionregistry;
use app\assets\Charts;
use app\assets\Consumption;
//use app\assets\ChartDateCalc;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-charts">
	<script type="text/javascript" src="/moniref/web/js/ChartsAjax.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="form-group field-contactform-subject required">
</div>

    <div class="row">
    	
        <form id="chartAttributeSelection">
	        <div>
		        <label class="control-label" for="contactform-subject">Seleccione la fecha de inicio del periodo de su consulta</label>
		    	<?php  
		    		//$startDate= new ChartDateCalc("start");
		    		//$startDate->render();
		    	?>
		    	<label class="control-label" for="contactform-subject">Seleccione la fecha de término del periodo de su consulta</label>
		    	<?php
		    		//$endDate= new ChartDateCalc("end");
		    		//$endDate->render();
		    	?>
	    	</div>
			<div>
				<label class="control-label" for="contactform-subject">Seleccione las unidades de su consulta:</label>
		        <select id="unitType" name="unitType" class='form-control' style='width: 30%;'>>
		        	<option value="w">Watts</option>
		        	<option value="a">Amperes</option>
		        	<option value="v">Volts</option>
		        </select>
		        <label class="control-label" for="contactform-subject">Seleccione el tipo de consulta:</label>
		        <select id="calcType" name="calcType" class='form-control' style='width: 30%;'>>
		        	<option value="a">Promedio</option>
		        	<option value="s">Total</option>
		        </select>
	        </div>

	        <p>
				<a class="btn btn-primary" id="submitDate">Consultar</a>
			</p>
	    </form>
      	<div id="Charts">
      	</div>
      	<script type="text/javascript">
        	$('#submitDate').click(function(event) {
		        $('#Charts').html("starting");
		        $.post('ChartDisplay.php', { 
		        	startYear: $('#startYear').val(), 
		        	startMonth:$('#startMonth').val(),
		        	startDay:$('#startDay').val(),
		        	endYear:$('#endYear').val(),
		        	endMonth:$('#endMonth').val(),
		        	endDay:$('#endDay').val(),
		        	unitType:$('#unitType').val(),
		        	calcType:$('#calcType').val()
		        }, function(data) {
		                $('#Charts').html(data);
		            }
		        );
		    });
		</script>
    </div>
</div>
<div class="row">
	

<?php 
	// El constructor de 'Consumption' pide 8 datos el primero siendo el cálculo que va a arrojar "consumo promedio" ("a") o consumo total ("s") para cada "apliance", los siguientes 3 componen la fecha inicial desde la cual se visualizará la información, los otros 3 parámetros la fecha 'tope' finalmente el tipo de dato que se obtendrá ya sea 'amps' (a), 'volts' (v) y 'wats' (w)
	
	// La función 'getData()' obtiene la información y la regresa para ser amacenada en una variable
    $consumptionWatts = new Consumption("a","2017","10","01","2017","10","31",'w','1');
    $consumptionVolts = new Consumption("a","2017","10","01","2017","10","31",'v','1');
    $consumptionAmps = new Consumption("a","2017","10","01","2017","10","31",'a','1');
    $datasetWatts=$consumptionWatts->getData(Yii::$app->user->id);
    $datasetVolts=$consumptionVolts->getData(Yii::$app->user->id);
    $datasetAmps=$consumptionAmps->getData(Yii::$app->user->id);

    print_r($datasetVolts);
    die();
	
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
