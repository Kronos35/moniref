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
</div>

    <div class="row">
    	<div class="col-md-6">
	    	<?= Html::beginForm(
	    		Url::toRoute("site/charts"),//action
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
		        		$startDays=array();
		        		for ($i=0; $i < 31; $i++) { 
		        			$startDays[$i+1]=$i+1;
		        		}
		        		echo Html::dropDownList("startDay",null,$startDays,['class'=>'form-control','style'=>'width:30%;']);
			    	?>
			    	</div>
			    	<script type="text/javascript">
			    		
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
		        		$endDays=array();
		        		for ($i=0; $i < 31; $i++) { 
		        			$endDays[$i+1]=$i+1;
		        		}
		        		echo Html::dropDownList("endDay",null,$endDays,['class'=>'form-control','style'=>'width:30%;']);
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
	      	<script type="text/javascript">
	        	$('#submitDate').click(function(event) {
			        $('#Charts').html("starting");
			    });
			</script>
		</div>
		<div class="col-md-6">
			<?php
				$startYear=null;
				$startMonth=null;
				$startDay=null;
				$endYear=null;
				$endMonth=null;
				$endDay=null;
				$calcType=null;
				$unitType=null;
				if (isset($_GET['startYear'])) {
					$startYear=$_GET['startYear'];
				}
				if (isset($_GET['startMonth'])) {
					$startMonth=$_GET['startMonth'];
				}
				if (isset($_GET['startDay'])) {
					$startDay=$_GET['startDay'];
				}
				if (isset($_GET['endYear'])) {
					$endYear=$_GET['endYear'];
				}
				if (isset($_GET['endMonth'])) {
					$endMonth=$_GET['endMonth'];
				}
				if (isset($_GET['endDay'])) {
					$endDay=$_GET['endDay'];
				}
				if (isset($_GET['calcType'])) {
					$calcType=$_GET['calcType'];
				}
				if (isset($_GET['unitType'])) {
					$unitType=$_GET['unitType'];
				}
				$consumptionWatts = new Consumption($calcType, $startYear, $startMonth, $startDay, $endYear, $endMonth, $endDay, $unitType, Yii::$app->user->id);
			    $datasetWatts=$consumptionWatts->getData();
				$chart = new Charts("charid2",$datasetWatts,"col-md-8",false);
				//$chart->setChartType($chart->type[2]);
				$chart->setChartTitle("Watts");
				if(isset($_GET['calcType']) && $_GET['calcType'] == "s"){
					$chart->setChartType($chart->type[2]);
					$chart->normalColors();
				}
				$chart->render();
			?>
		</div>
    </div>
</div>
<div class="row" id="Charts">
	
</div>