<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Consumptionregistry;
use app\models\User;
use app\assets\Charts;
use app\assets\Consumption;
use app\assets\ChartDateCalc;

$this->title = 'Charts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-charts">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="form-group field-contactform-subject required">
    <script type="text/javascript">
    	function calculateDays(type){
			var y = $('#'+type+'Year').val();
			var m = $('#'+type+'Month').val();
			var days = new Date(y,m,1,-1).getDate();
			return days;
		}
		function printDays(type){
			var days = calculateDays('start');
			Day='';
	    	for (var i = 0; i < days; i++) {
	    		
	    		Day+='<option value='+(i+1)+'>'+(i+1)+'</option>';

	    	}
			$('#'+type+'Day').html(Day);
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
		        <div class="form-group">
		        	<div id="start">
		        	<?php
		        		echo Html::label("Seleccione Seleccione la fecha de inicio del periodo de su consulta",'startDate');
		        		echo "<br/>";

		        		/*****Calculo de los años*****/
		        		$tYear=date('Y');		        		
		        		$dropYear = array();
		        		if ($tYear>2017) {
		        			for ($i=2017; $i <= $tYear; $i++) { 
		        				$dropYear[$i]=$i;
		        			}
		        		}
		        		else {
		        			$dropYear[2017]=2017;
		        		}
		        		echo Html::dropDownList("startYear",(isset($_GET['startYear'])?$_GET['startYear']:null),$dropYear,['class'=>'form-control','id'=>'startYear', 'onchange'=>'printDays("start")','style'=>'width:30%;']);
		        		$months= array();
		        		for ($i=0; $i < 12; $i++) { 
		        			$months[$i+1]=$i+1;
		        		}
		        		echo Html::dropDownList("startMonth",(isset($_GET['startMonth'])?$_GET['startMonth']:null),$months,['class'=>'form-control', 'id'=>'startMonth','style'=>'width:30%;', 'onchange'=>'printDays("start")']);
		        		echo Html::dropDownList("startDay",null,array(),['class'=>'form-control','id'=>'startDay','style'=>'width:30%;']);
			    	?>
			    	</div>
			    	<script type="text/javascript">
			    		
			    	</script>
			    	<div id="end">
			    	<?=
			    		Html::label("Seleccione la fecha de término del periodo de su consulta", 'endDate');
			    		echo "<br>";

		        		echo Html::dropDownList("endYear",(isset($_GET['endYear'])?$_GET['endYear']:null),$dropYear,['class'=>'form-control','style'=>'width:30%;', 'id'=>'endYear', 'onchange'=>'printDays("end")']);
		        		$months= array();
		        		for ($i=0; $i < 12; $i++) { 
		        			$months[$i+1]=$i+1;
		        		}
		        		echo Html::dropDownList("endMonth",(isset($_GET['endMonth'])?$_GET['endMonth']:null),$months,['class'=>'form-control','style'=>'width:30%;', 'id'=>'endMonth','onchange'=>'printDays("end")']);
		        		echo Html::dropDownList("endDay",null,array(),['class'=>'form-control','style'=>'width:30%;', 'id'=>'endDay']);
			    	?>
			    	</div>
					<label class="control-label" for="contactform-subject">Seleccione las unidades de su consulta:</label>
					<br>
					<?php
						echo Html::dropDownList("unitType",(isset($_GET['unitType'])?$_GET['unitType']:null), ['w'=>'Watts','a'=>'Amperes','v'=>'Volts', 'price'=>'price'], ['class'=>'form-control','style'=>'width:30%;', 'id'=>'unitType']);
					?>
			        <br>
			        <label class="control-label" for="contactform-subject">Seleccione el tipo de consulta:</label>
			        <br>
			        <?php
						echo Html::dropDownList("calcType",(isset($_GET['calcType'])?$_GET['calcType']:null), ['a'=>'Promedio','s'=>'Total'], ['class'=>'form-control','style'=>'width:30%;', 'id'=>'calcType']);
					?>
		        </div>

		        <p>
					<?= Html::submitInput("Consultar",["class"=>"btn btn-primary"]);
					?>				
					
				</p>
			<?= Html::endForm()?>
	      	<div id="charts">
	      	</div>
	      	<script type="text/javascript">
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
				if (isset($_GET['unitType'])) {
					$unitType=$_GET['unitType']=='price'?'w':$_GET['unitType'];
				}
				if (isset($_GET['calcType'])) {
					$calcType= $_GET['unitType']=='price'?'s':$_GET['unitType'];
				}
				
				$consumptionWatts = new Consumption($calcType, $startYear, $startMonth, $startDay, $endYear, $endMonth, $endDay, $unitType, Yii::$app->user->id);
			    $datasetWatts=$consumptionWatts->getData();

			    
			    $chart = "";
			    if (isset($_GET['unitType']) && $_GET['unitType']=='price') {
			    	$data = array();
				    $user = User::findOne(["idUser"=>Yii::$app->user->id]);
				    foreach ($datasetWatts as $key => $value) {
				    	$data[$key] = ($value/1000) * $user->Tarifa;
				    }
				    $chart = new Charts("charid2",$data,"col-md-8",false);
			    }
			    else{
			    	$chart = new Charts("charid2",$datasetWatts,"col-md-8",false);
			    }

				if(isset($_GET['unitType']) && $_GET['unitType'] == "a"){
					$chart->setChartTitle("ampers");
				}
				else if(isset($_GET['unitType']) && $_GET['unitType'] == "w"){
					$chart->setChartTitle("watts");
				}
				else if(isset($_GET['unitType']) && $_GET['unitType'] == "v"){
					$chart->setChartTitle("volts");
				}

				if(isset($_GET['calcType']) && $_GET['calcType'] == "s" && $_GET['unitType']!='price'){
					$chart->setChartType($chart->type[2]);
					$chart->normalColors();
				}
				$chart->render();
			?>
		</div>
    </div>
</div>