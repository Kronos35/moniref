<?php
namespace app\assets;
use Yii;
use yii\helpers\Html;
use app\models\Apliance;

class Consumption{
	private $result= array();
	private $query;
	private $optn;
	private $conType;
	private $startDate;
	private $endDate;
	private $user_idUser;

	//Valid option inputs 'a' and 's' only it choses wether the graph will output an avg or a sum of registries
	//StartYear and endYear are set in the following format 'YYYY-MM-DD hh:mm:ss'
	function __construct($initOptn, $startDateYYYY, $startDateMM, $startDateDD, $endDateYYYY, $endDateMM, $endDateDD, $cType,$user_idUser) {
		if (is_null($startDateYYYY)) {
			$startDateYYYY=date("Y");
		}
		if (is_null($startDateMM)) {
			$startDateMM=date('m', strtotime('-1 month'));
		}
		if (is_null($startDateDD)) {
			$startDateDD=date("d");
		}
		if (is_null($endDateYYYY)) {
			$endDateYYYY=date("Y");
		}
		if (is_null($endDateMM)) {
			$endDateMM=date("m");
		}
		if (is_null($endDateDD)) {
			$endDateDD=date("d");
		}
		$this->startDate=$startDateYYYY."-".$startDateMM."-".$startDateDD." 00:00:00";
		$this->endDate=$endDateYYYY."-".$endDateMM."-".$endDateDD." 00:00:00";
		$this->user_idUser=$user_idUser;
		switch ($initOptn) {
			case 'a':
				$this->optn="AVG";
				break;	
			case 's':
				$this->optn="SUM";
				break;
			default:
				$this->optn="AVG";
				break;
		}
		switch ($cType) {
			case 'w':
				$this->conType="watts";
				break;
			case 'a':
				$this->conType="amps";
				break;
			case 'v':
				$this->conType="volts";
				break;
			default:
				$this->conType="watts";
				break;
		}
    }
    //rearranges the data to be compatible with the 'charts' class
    private function setData(){
		foreach ($this->query as $subarray) {
			$id = 0;
			foreach ($subarray as $key => $value) {
				if($key == "idApliance"){
					$id = $value;
				}
				else{
					$model = Apliance::findOne(["idApliance"=>$id]);
					$this->result[$model->Marca . " " . $model->Modelo] = $value;
				}
			}
		}
	}
    public function getData(){
    	$sql='SELECT a.idApliance, '.$this->optn.'(cr.'.$this->conType.') FROM consumptionregistry cr INNER JOIN apliance a ON a.idApliance = cr.apliance_idApliance AND (cr.date BETWEEN "'.$this->startDate.'" AND "'.$this->endDate.'") INNER JOIN proto_has_apliance phs ON phs.apliance_idApliance = a.idApliance INNER JOIN proto p ON phs.Proto_idProto = p.idProto AND p.user_idUser = '.$this->user_idUser.' GROUP BY a.idApliance';
    	$this->query = Yii::$app->db->createCommand($sql)->queryAll();
        $this->setData();
        if (count($this->result)>0){
        	return $this->result;
        }
        else{
        	$noRegistry=array("No stored registries"=>'0');
        	return $noRegistry;
        }
        
    }
}	
?>