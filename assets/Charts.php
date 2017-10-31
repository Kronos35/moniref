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

	function __construct($chartid,$data= ["EJ"=>1,"EJ"=>2,"EJ"=>10,"EJ"=>20],$optionclass="col-md-6",$rand = true) {
       $this->optionclass = $optionclass;
       $this->data = $data;
       $this->rand = $rand;
       $this->chartid = $chartid;
       $this->charttype = "doughnut";
       $this->title = "Mi gráfica";
    }

    public function sortData(){
    	asort($this->data);
    }

	public function setOptionClass($optionclass){
		$this->optionclass = $optionclass;
	}

	public function setData($data){
		$this->data = $data;
	}

	public function getData(){
		$string = "[";
		foreach ($this->data as $key => $value) {
			$string .= "'" . $value . "', ";
		}
		return $string . "]";
	}

	public function getLabels(){
		$string = "[";
		foreach ($this->data as $key => $value) {
			$string .= "'" . $key . "', ";
		}
		return $string . "]";
	}

	public function getColours(){
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

	public function getborders(){
		$string = "[";
		foreach ($this->data as $key => $value) {
			$string .= "'rgba(255,255,255,1)',";
		}
		return $string . "]";
	}

	public function setChartType($type){
		$this->charttype = $type;
	}

	public function setChartTitle($title){
		$this->title = $title;
	}

	public function render(){
		echo Html::jsFile('@web/js/Chart.bundle.js');
		echo "
	    <div class=\"$this->optionclass\">
	    	<div id=\"canvas-holder\">
				<canvas id=\"chart-area\" width=\"100\" height=\"100\"></canvas>
			</div>

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