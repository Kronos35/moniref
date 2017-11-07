<?php
namespace app\assets;

use Yii;
use yii\helpers\Html;

class Charts{
	private $optionclass;
	private $data;
	private $rand;
	private $chartid;
	private $charttype;
	public $type = array("pie","doughnut","bar","line","radar","polarArea");
	private $title;

	/*
		Poderoso constructor
	*/
	function __construct($chartid="basechart",$data= ["EJ1"=>1,"EJ2"=>2,"EJ4"=>20,"EJ3"=>10],$optionclass="col-md-12",$rand = true) {
       $this->optionclass = $optionclass;
       $this->data = $data;
       $this->rand = $rand;
       $this->chartid = $chartid;
       $this->charttype = "doughnut";
       $this->title = "Mi gráfica";
    }

    /*
		Funcion que ordena los datos
	*/
    public function sortData(){
    	asort($this->data);
    }

    /*
		Funcion que asigna el tipo de clase para mostrar el chart
	*/
	public function setOptionClass($optionclass){
		$this->optionclass = $optionclass;
	}

	/*
		Funcion que asigna los datos al chart
	*/
	public function setData($data){
		$this->data = $data;
	}

	private function getData(){
		$string = "[";
		foreach ($this->data as $key => $value) {
			$string .= "'" . $value . "', ";
		}
		return $string . "]";
	}

	private function getLabels(){
		$string = "[";
		foreach ($this->data as $key => $value) {
			$string .= "'" . $key . "', ";
		}
		return $string . "]";
	}

	private function getColours(){
		if($this->rand==true){
			$string = "[";
			foreach ($this->data as $key => $value) {
				$string .= "'rgba(" . rand(0,255) . "," . rand(0,255) . "," . rand(0,255) . ",1)',";
			}
			return $string . "]";
		}
		else{
			$string = "[";
			$increment = 255/count($this->data);
			$power = 0;
			foreach ($this->data as $key => $value) {
				$string .= "'rgba(" . ($power += round($increment)) . ",0,0,1)',";
			}
			return $string . "]";
		}
	}
	/*
		Funcion hace los colores aleatorios YOLO
	*/
	public function randomColors(){
		$this->rand = true;
	}
	/*
		Funcion cambia los colores a rojo y se va incrementando la intencidad
	*/
	public function normalColors(){
		$this->sortData();
		$this->rand = false;
	}	

	private function getborders(){
		$string = "[";
		foreach ($this->data as $key => $value) {
			$string .= "'rgba(255,255,255,1)',";
		}
		return $string . "]";
	}

	/*
		Funcion que asigna el tipo de chart.
	*/
	public function setChartType($type){
		$this->charttype = $type;
	}

	/*
		Funcion que asigna el Título al chart (no funciona en dona o pie)
	*/
	public function setChartTitle($title){
		$this->title = $title;
	}

	/*
		Funcion que te dibuja el chart.
	*/
	public function render(){
		echo Html::jsFile('@web/js/Chart.bundle.js');
		echo "
	    <div class=\"$this->optionclass\">
	    	<!--<div id=\"canvas-holder\">
				<canvas id=\"chart-area\" width=\"100\" height=\"100\"></canvas>
			</div>-->

			<canvas id=\"" . $this->chartid . "\" width=\"100\" height=\"100\">
				
			</canvas>
				
			<script>
				var ctx = document.getElementById(\"". $this->chartid . "\").getContext('2d');

				var myChart = new Chart(ctx, {
				    type: '" . $this->charttype . "',
				    data: {
				        labels: " . $this->getLabels() . ",
				        datasets: [{
				            label: '".$this->title."',
				            data:" . $this->getData() . ",
				            backgroundColor: " . $this->getColours() . ",
				            borderColor: ".$this->getborders().",
				            borderWidth: 2
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
	    </div>";
	}

}


?>