<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php echo Html::jsFile('@web/js/Chart.bundle.js'); ?>

    <div class="col-md-offset-4 col-md-3">
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
    <div class="row">
    	<p>
    	    This is the About page. You may modify the following file to customize its content:
    	</p>

    	<code><?= __FILE__ ?></code>
    </div>
</div>

