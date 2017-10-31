<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\Consumptionregistry;
use app\assets\Charts;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php 
    $consumptionWatts = Yii::$app->db->createCommand('
            SELECT
                a.idApliance,
                AVG(cr.watts)
            FROM
                consumptionregistry cr
            INNER JOIN
                apliance a
            ON
                a.idApliance = cr.apliance_idApliance
            INNER JOIN
              proto_has_apliance phs
            ON
                phs.apliance_idApliance = a.idApliance
            INNER JOIN
                proto p
            ON
                phs.Proto_idProto = p.idProto AND p.user_idUser = 1
            GROUP BY
                a.idApliance
        ')->queryAll();

    $dataset = array();
	foreach ($consumptionWatts as $subarray) {
		$id = 0;
		foreach ($subarray as $key => $value) {
			if($key == "idApliance"){
				$id = $value;
			}
			else{
				$dataset["app-id-".$id] = $value;
			}
		}
	}

	// el constructor pide charts (array(clave=>valor)) de datos, $string parametros (aquí va el col-md-5 o esas weas) y finalmente un bool random o no random (true = random)
	$charts = new Charts("chartaso",$dataset,"col-md-5",false);
	//se usa el metodo render para mostrar el chart
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
	// clase de charts //
	// requiere llamar esto: "use app\assets\Charts;" //

	// el constructor de charts pide $string(id del chart), (array(clave=>valor)) de datos, $string parametros (aquí va el col-md-5 o esas weas) y finalmente un bool random o no random (true = random)
	$charts = new Charts("charid",$dataset,"col-md-3",false);
	// metodo que permite cambiar el tipo de grafica, si no se usa por defecto es el de dona
	$charts->setChartType($charts->type[0]);
	// metodo que permite ordenar los datos de menor a mayor
	$charts->sortData();
	// se usa el metodo render para mostrar el chart
	$charts->render();

	// Este es un ejemplo de otra chart en la misma pantalla
	$charts2 = new Charts("charid2",$dataset,"col-md-3",false);
	$charts2->setChartType($charts2->type[1]);
	$charts2->render();

	$charts3 = new Charts("charid3",$dataset,"col-md-3",true);
	$charts3->setChartType($charts3->type[2]);
	// este metodo permite cambiar el nombre a la grafica
	$charts3->setChartTitle("Mi graficota");
	$charts3->render();

	$charts4 = new Charts("charid4",$dataset,"col-md-3",true);
	$charts4->setChartType($charts4->type[3]);
	$charts4->render();

?>
</div>

<div class="row">
	<?php
		$charts5 = new Charts("charid5",$dataset,"col-md-3",true);
		$charts5->setChartType($charts5->type[4]);
		$charts5->render();

		$charts6 = new Charts("charid6",$dataset,"col-md-3",true);
		$charts6->setChartType($charts5->type[5]);
		$charts6->render();
	?>
	
</div>
