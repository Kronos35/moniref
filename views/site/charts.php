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
<div class="site-charts">
	<script type="text/javascript" src="/moniref/web/js/ChartsAjax.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="form-group field-contactform-subject required">
</div>

    <div class="row">
    	<div class="col-md-6">
	    	<?= Html::beginForm(
	    		Url::toRoute("site/chartdisplay"),//action
	    		"get",//method
	    		['class'=>'form-inline']//options
	    	);
	    	?>
	    	<h3><?= $message?></h3>    	
		        <div class="form-group">
		        	<div id="start">
		        	<?php
		        		echo Html::label("Seleccione Seleccione la fecha de inicio del periodo de su consulta",'startDate');
		        		echo "<br/>";
		        		echo Html::dropDownList("startYear",null,['2017'=>'2017'],['class'=>'form-control','style'=>'width:30%;']);
		        		$months= array();
		        		for ($i=0; $i < 12; $i++) { 
		        			$months[$i+1]=$i+1;
		        		}
		        		echo Html::dropDownList("startMonth",null,$months,['class'=>'form-control','style'=>'width:30%;']);
		        		$days=array();
		        		echo Html::dropDownList("startDay",null,$days,['class'=>'form-control','style'=>'width:30%;']);
			    		//$startDate= new ChartDateCalc("start");
			    		//$startDate->render();
			    	?>
			    	</div>
			    	<script type="text/javascript">
			    		function calculateDays(var type){
							var y = $('#'+type+'Year').val();
							var m = $('#'+type+'Month').val();
							var days = new Date(y,m,1,-1).getDate();
							return days;
						}
						function printDays(var type){
							var days = calculateDays();
					    	for (var i = 0; i < days; i++) {
					    		Day='<option value='+(i+1)+'>'+(i+1)+'</option>';
					    	}
							$('#'+type+'Day').html(".$this->selDateID."Day);
						}
						$('#startMonth').ready(function() {
						    printDays('start');
						});
					    $('#startMonth').change(function(event) {
					    	printDays('start');
					    });
					    $('#endYear').ready(function(event) {
					    	printDays('end');
					    });
					    $('#endYear').change(function(event) {
					    	printDays('end');
					    });
			    	</script>
			    	<div id="end">
			    	<?=
			    		Html::label("Seleccione la fecha de término del periodo de su consulta", 'endDate');
			    		echo "<br>";

		        		echo Html::dropDownList("endYear",null,['2017'=>'2017'],['class'=>'form-control','style'=>'width:30%;']);
		        		$months= array();
		        		for ($i=0; $i < 12; $i++) { 
		        			$months[$i+1]=$i+1;
		        		}
		        		echo Html::dropDownList("endMonth",null,$months,['class'=>'form-control','style'=>'width:30%;']);
		        		$days=array();
		        		echo Html::dropDownList("endDay",null,$days,['class'=>'form-control','style'=>'width:30%;']);
			    		//$endDate= new ChartDateCalc("end");
			    		//$endDate->render();
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
					<?= Html::submitInput("Consultar",["class"=>"btn btn-primary"]);
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
		<div class="col-md-6">
			<?php 

				$chartmax = new Charts();
				$chartmax->setOptionClass("col-md-8");

				if(isset($_GET['calcType']) && $_GET['calcType'] == "s"){
					$chartmax->setChartType($chartmax->type[2]);
					$chartmax->normalColors();
				}
				$chartmax->render();
			?>
		</div>
    </div>
</div>
<div class="row" id="Charts">
	
</div>