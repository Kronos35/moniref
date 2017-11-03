<?php
namespace app\assets;
use Yii;
use yii\helpers\Html;

class ChartDateCalc{
	private $selDateID;
	//Valid option inputs 'start' and 'end' only, this parameter id's theStart or end date selection
	//StartYear and endYear are set in the following format 'YYYY-MM-DD hh:mm:ss'
	function __construct($Type) {
		$this->selDateID=$Type;
	}
    //rearranges the data to be compatible with the 'charts' class
    public function render(){
    	echo "<select id='".$this->selDateID."Year' class='form-control' style='width: 30%;'>";
    	$todayYear= date("Y");
		if ($todayYear==2017) {
			echo "<option value=2017>2017</option>";
		}
		else
		for ($i=$todayYear; $i >= (2017); $i--) {
			echo "<option value=".$todayYear.">".$todayYear."</option>";
			$todayYear--;
		}
		echo "</select>";
		echo "<select id='".$this->selDateID."Month' class='form-control' style='width: 30%;'>";
		for ($i=0; $i < 12; $i++) {
			$todayMonth= $i+1;
			echo "<option value=".$todayMonth.">".$todayMonth."</option>";		
		}
		echo "</select>";
		echo "<select id='".$this->selDateID."Day' class='form-control' style='width: 30%;'></select>";
		$script="
			<script type='text/javascript'>
				function calculateDays(){
					var y = $('#".$this->selDateID."Year').val();
					var m = $('#".$this->selDateID."Month').val();
					var days = new Date(y,m,1,-1).getDate();
					return days;
				}
			    $('#".$this->selDateID."Month').change(function(event) {
			    	var days = calculateDays();
			    	for (var i = 0; i < days; i++) {
				    	".$this->selDateID."Day='<option value='+days+'>'+days+'</option>';
				    }
					$('#".$this->selDateID."Day').html(".$this->selDateID."Day);
			    });
			    $('#".$this->selDateID."Year').change(function(event) {
			    	var days = calculateDays();
			    	for (var i = 0; i < days; i++) {
			    		".$this->selDateID."Day='<option value='+(days+1)+'>'+(days+1)+'</option>';
			    	}
					$('#".$this->selDateID."Day').html(".$this->selDateID."Day);
			    }); 
			</script>";
		echo $script;
    }
}	
?>