<?php
namespace app\assets;

use yii\helpers\Html;


class Watts{
	private $sum;
	private $avg;
	private $optn;
	private $result;
	//Valid inputs 'a', 's' only
	function __construct($initOptn, $startDate, $endDate) {
		switch (initOptn) {
			case 'a':
				$optn="AVG"
				break;
			case 's':
				$optn="SUM"
				break;
		}
		$this->result= = Yii::$app->db->createCommand('
            SELECT
                a.idApliance,
                '$optn'(cr.watts)
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

	public function render(){
		echo Html::jsFile('@web/js/Chart.bundle.js');
		echo "
	    <div class=\"$this->optionclass\">
	    	<div id=\"canvas-holder\">
				<canvas id=\"chart-area\" width=\"100\" height=\"100\"></canvas>
			</div>

			<canvas id=\"myChart\" width=\"100\" height=\"100\">
				
			</canvas>
				
			<script>
				var ctx = document.getElementById(\"myChart\").getContext('2d');

				var myChart = new Chart(ctx, {
				    type: 'doughnut',
				    data: {
				        labels: " . $this->getLabels(). ",
				        datasets: [{
				            label: '# of Votes',
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