<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Consumptionregistry;
use app\assets\Charts;
use app\assets\Consumption;
use app\assets\ChartDateCalc;

$this->title = 'Charts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
	<script type="text/javascript" src="/moniref/web/js/ChartsAjax.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="form-group field-contactform-subject required">
</div>

    <div class="row">
    	<?= Html::beginForm(
    		Url::toRoute("site/chartDisplay"),//action
    		"get",//method
    		['class'=>'form-inline']//options
    	);
    	?>
    	<h3><?= $message?></h3>    	
	        <div class="form-group">
	        	<div id="start">
	        	<?=
	        		Html::label("Seleccione Seleccione la fecha de inicio del periodo de su consulta",'startDate');
	        		echo "<br/>";
		    		//Html::dropDownList("startYear",null,['2017'=>'2017']);
		    		$startDate= new ChartDateCalc("start");
		    		$startDate->render();
		    	?>
		    	</div>
		    	<div id="end">
		    	<?=
		    		Html::label("Seleccione la fecha de término del periodo de su consulta", 'endDate');
		    		echo "<br>";
		    		$endDate= new ChartDateCalc("end");
		    		$endDate->render();
		    	?>
		    	</div>
				<label class="control-label" for="contactform-subject">Seleccione las unidades de su consulta:</label>
				<br>
		        <select id="unitType" name="unitType" class='form-control' style='width: 30%;'>
		        	<option value="w">Watts</option>
		        	<option value="a">Amperes</option>
		        	<option value="v">Volts</option>
		        </select>
		        <br>
		        <label class="control-label" for="contactform-subject">Seleccione el tipo de consulta:</label>
		        <br>
		        <select id="calcType" name="calcType" class='form-control' style='width: 30%;'>
		        	<option value="a">Promedio</option>
		        	<option value="s">Total</option>
		        </select>
	        </div>

	        <p>
				<?= Html::submitInput("Consultar",["class"=>"btn btn-primary"]) 
				//<a class="btn btn-primary" id="submitDate">Consultar</a>
				?>				
				
			</p>
		<?= Html::endForm()?>
      	<div id="Charts">
      	</div>
      	<script type="text/javascript">
        	$('#submitDate').click(function(event) {
		        $('#Charts').html("starting");
		    });
		</script>
    </div>
</div>
<div class="row" id="Charts">
	
</div>