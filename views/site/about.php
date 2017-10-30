<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\Consumptionregistry;
use app\assets\Charts;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php 
	// clase de charts //
	// requiere llamar esto: "use app\assets\Charts;" //

	// el constructor pide charts (array(clave=>valor)) de datos, $string parametros (aquí va el col-md-5 o esas weas) y finalmente un bool random o no random (true = random)
	$charts = new Charts(["data1"=>1,"data2"=>9, "potato"=>50, "data3"=>13,"data4"=>8, "potato2"=>25],"col-md-4",false);
	//se usa el metodo render para mostrar el chart
	$charts->render();
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

