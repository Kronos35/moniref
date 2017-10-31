<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\Consumptionregistry;
use app\assets\Charts;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<<<<<<< HEAD
=======
<<<<<<< HEAD
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php echo Html::jsFile('@web/js/Chart.bundle.js'); ?>

<div name="graph" class="col-md-3 col-md-offset-4">
	<div id="canvas-holder">
	<canvas id="chart-area" width="100" height="100"></canvas>
	</div>

	<canvas id="myChart" width="100" height="100">
		
	</canvas>
	
	<script>
	var ctx = document.getElementById("myChart").getContext('2d');
	var myChart = new Chart(ctx, {
	    type: 'doughnut',
	    data: {
	        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
	        datasets: [{
	            label: '# of Votes',
	            data: [12, 19, 3, 5, 2, 3],
	            backgroundColor: [
	                'rgba(255, 99, 132, 0.2)',
	                'rgba(54, 162, 235, 0.2)',
	                'rgba(255, 206, 86, 0.2)',
	                'rgba(75, 192, 192, 0.2)',
	                'rgba(153, 102, 255, 0.2)',
	                'rgba(255, 159, 64, 0.2)'
	            ],
	            borderColor: [
	                'rgba(255,99,132,1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(255, 206, 86, 1)',
	                'rgba(75, 192, 192, 1)',
	                'rgba(153, 102, 255, 1)',
	                'rgba(255, 159, 64, 1)'
	            ],
	            borderWidth: 1
	        }]
	    },
	    options: {
	        /*scales: {
	            yAxes: [{
	                ticks: {
	                    beginAtZero:true
	                }
	            }]
	        }*/
	    }
	});
	</script>
</div>
    
=======


    <?php 
        echo Html::jsFile('@web/js/Chart.bundle.js'); 
    ?>
<?php 
    $consumptionWatts = Yii::$app->db->createCommand('SELECT * FROM user')->queryAll();
	// clase de charts //
	// requiere llamar esto: "use app\assets\Charts;" //

	// el constructor pide charts (array(clave=>valor)) de datos, $string parametros (aquí va el col-md-5 o esas weas) y finalmente un bool random o no random (true = random)
	$charts = new Charts(["data1"=>1,"data2"=>9, "potato"=>50, "data3"=>13,"data4"=>8, "potato2"=>25],"col-md-4",false);
	//se usa el metodo render para mostrar el chart
	$charts->render();
?>

>>>>>>> adbc18c67a72c2c102171de40b242d7e9d5c120e
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
    	<p>
    	    This is the About page. You may modify the following file to customize its content:
    	</p>
>>>>>>> 0f8f486a83f225379278d65ff4e97783ede8ca94

    	<code><?= __FILE__ ?></code>
    </div>
</div>
<div class="row">
	

<?php 
	// clase de charts //
	// requiere llamar esto: "use app\assets\Charts;" //

	// el constructor de charts pide $string(id del chart), (array(clave=>valor)) de datos, $string parametros (aquí va el col-md-5 o esas weas) y finalmente un bool random o no random (true = random)
	$charts = new Charts("charid",["data1"=>1,"data2"=>9, "potato"=>50, "data3"=>13,"data4"=>8, "potato2"=>25],"col-md-3",true);
	// metodo que permite cambiar el tipo de grafica, si no se usa por defecto es el de dona
	$charts->setChartType($charts->type[0]);
	// metodo que permite ordenar los datos de menor a mayor
	$charts->sortData();
	// se usa el metodo render para mostrar el chart
	$charts->render();

	// Este es un ejemplo de otra chart en la misma pantalla
	$charts2 = new Charts("charid2",["potato"=>99, "data3"=>180,"data4"=>40, "potato2"=>13],"col-md-3",false);
	$charts2->setChartType($charts2->type[1]);
	$charts2->render();

	$charts3 = new Charts("charid3",["data2"=>11, "potato"=>21, "data3"=>7,"data4"=>30, "potato2"=>44],"col-md-3",true);
	$charts3->setChartType($charts3->type[2]);
	// este metodo permite cambiar el nombre a la grafica
	$charts3->setChartTitle("Mi graficota");
	$charts3->render();

	$charts4 = new Charts("charid4",["data2"=>11, "potato"=>21, "data3"=>7,"data4"=>30, "potato2"=>44],"col-md-3",true);
	$charts4->setChartType($charts4->type[3]);
	$charts4->render();
?>
</div>

<div class="row">
	<?php
		$charts5 = new Charts("charid5",["data2"=>11, "potato"=>21, "data3"=>7,"data4"=>30, "potato2"=>44],"col-md-3",true);
		$charts5->setChartType($charts5->type[4]);
		$charts5->render();

		$charts6 = new Charts("charid6",["data2"=>11, "potato"=>21, "data3"=>7,"data4"=>30, "potato2"=>44],"col-md-3",true);
		$charts6->setChartType($charts5->type[5]);
		$charts6->render();
	?>
	
</div>

