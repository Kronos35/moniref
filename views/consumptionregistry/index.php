<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
    use app\models\Consumptionregistry;
    use app\models\Apliance;
    use app\models\User;
    use app\assets\Charts;
    use app\assets\Consumption;
    use yii\helpers\Url;
    use yii\helpers\ArrayHelper;

    $this->title = 'Consumption Registry';
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <?php 
        echo "<div class=\"col-md-3\">";
            echo Html::beginForm(Url::toRoute("consumptionregistry/index"), "get",['class'=>'form-inline']);
            $items = ArrayHelper::map(Apliance::find()->where(["user_idUser"=>Yii::$app->user->id])->all(), 'idApliance', 'Marca'); 
            echo Html::dropDownList("app",(isset($_GET['app'])?$_GET['app']:null),$items) . "<br>";
            echo Html::submitInput("Consultar",["class"=>"btn btn-primary"]);
            echo Html::endForm();
        echo "</div>";
        echo "<div class=\"col-md-3\">";
            echo "<h1>Costo por hora:</h1>";
            $grafica = array();
            if(isset($_GET['app'])){
                $tarifa = User::findOne(['idUser'=>Yii::$app->user->id])->Tarifa;
                $regDay = array();
                
                foreach (Consumptionregistry::find()->where(["apliance_idApliance"=>$_GET['app']])->all() as $registry) {
                    if(isset($regDay[date("d-m-Y G",strtotime($registry->date))])){
                        array_push($regDay[date("d-m-Y G",strtotime($registry->date))], $registry);
                    }
                    else{
                        $regDay[date("d-m-Y G",strtotime($registry->date))] = array($registry);
                    }
                    $grafica[date("d-m-Y G",strtotime($registry->date))] = array();
                }
                foreach ($regDay as $key => $value) {
                    echo "<h2>" . $key . ":</h2>";
                    $promedio = 0;
                    foreach ($value as $data) {
                        $promedio += $data->watts;
                    }
                    $final = $promedio/3600;
                    $grafica[$key] = $final;
                    echo "<h4>Costo/H: $ " . round(($final/1000)*$tarifa,4) . "</h4>";
                }
                echo "<h2>Current W/H:</h2>";
                $last = Consumptionregistry::find()->where(["apliance_idApliance"=>$_GET['app']])->orderBy("date desc")->limit(1)->all();
                // print_r(sizeof($last)>0?"true":"false");
                // die();
                echo "<h4>" . ((sizeof($last)>0)?$last[0]->watts:"0") . " w/h</h4>";
            }
        echo "</div>";
        echo "<div class=\"col-md-6\">";
            $charts = new Charts("char",$grafica ,"col-md-8",true);
            $charts->render();
        echo "</div>";
    ?>
</div>

<hr>
<div class="consumptionregistry-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-md-6">
            <?php echo Html::beginForm(Url::toRoute("site/charts"), "get",['class'=>'form-inline']); ?>
            <div class="form-group">
                <div id="start">
                    <?php
                        echo Html::label("Seleccione Seleccione la fecha de inicio del periodo de su consulta",'startDate') . "<br/>";

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
                        echo Html::dropDownList(
                            "startYear",
                            (isset($_GET['startYear'])?$_GET['startYear']:null),
                            $dropYear,
                            ['class'=>'form-control','id'=>'startYear', 'onchange'=>'printDays("start")','style'=>'width:30%;']
                        );
                        $months= array();
                        for ($i=0; $i < 12; $i++) { 
                            $months[$i+1]=$i+1;
                        }
                        echo Html::dropDownList(
                            "startMonth",
                            (isset($_GET['startMonth'])?$_GET['startMonth']:null),
                            $months,
                            ['class'=>'form-control', 'id'=>'startMonth','style'=>'width:30%;', 'onchange'=>'printDays("start")']
                        );
                        echo Html::dropDownList(
                            "startDay",
                            null,
                            array(),
                            ['class'=>'form-control','id'=>'startDay','style'=>'width:30%;']
                        );
                    ?>
                </div>
                <div id="end">
                    <?php
                        echo Html::label("Seleccione la fecha de término del periodo de su consulta", 'endDate') . "<br>";
                        echo Html::dropDownList(
                            "endYear",
                            (isset($_GET['endYear'])?$_GET['endYear']:null),
                            $dropYear,
                            ['class'=>'form-control','style'=>'width:30%;', 'id'=>'endYear', 'onchange'=>'printDays("end")']
                        );
                        $months= array();
                        for ($i=0; $i < 12; $i++) { 
                            $months[$i+1]=$i+1;
                        }
                        echo Html::dropDownList(
                            "endMonth",
                            (isset($_GET['endMonth'])?$_GET['endMonth']:null),
                            $months,
                            ['class'=>'form-control','style'=>'width:30%;', 'id'=>'endMonth','onchange'=>'printDays("end")']
                        );
                        echo Html::dropDownList(
                            "endDay",
                            null,
                            array(),
                            ['class'=>'form-control','style'=>'width:30%;', 'id'=>'endDay']
                        );
                    ?>
                </div>
                <label class="control-label" for="contactform-subject">Seleccione las unidades de su consulta:</label><br>
                <?php
                    echo Html::dropDownList(
                        "unitType",
                        (isset($_GET['unitType'])?$_GET['unitType']:null), 
                        ['w'=>'Watts','a'=>'Amperes','v'=>'Volts'], 
                        ['class'=>'form-control','style'=>'width:30%;', 'id'=>'unitType']
                    );
                ?>
                <br><label class="control-label" for="contactform-subject">Seleccione el tipo de consulta:</label><br>
                <?php
                    echo Html::dropDownList(
                        "calcType",
                        (isset($_GET['calcType'])?$_GET['calcType']:null), 
                        ['a'=>'Promedio','s'=>'Total'], 
                        ['class'=>'form-control','style'=>'width:30%;', 'id'=>'calcType']
                    );
                ?>
            </div>
            <p><?php echo Html::submitInput("Consultar",["class"=>"btn btn-primary"]); ?></p>
            <?php echo Html::endForm(); ?>
        </div>
        <div class="col-md-6">
            <?php // Dibuja la grafica en la pantalla //
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
                if (isset($_GET['calcType'])) {
                    $calcType=$_GET['calcType'];
                }
                if (isset($_GET['unitType'])) {
                    $unitType=$_GET['unitType'];
                }
                $consumptionWatts = new Consumption(
                    $calcType, 
                    $startYear, 
                    $startMonth, 
                    $startDay, 
                    $endYear, 
                    $endMonth, 
                    $endDay, 
                    $unitType, 
                    Yii::$app->user->id
                );
                $datasetWatts=$consumptionWatts->getData();
                $chart = new Charts("charid2",$datasetWatts,"col-md-8",false);

                if(isset($_GET['unitType']) && $_GET['unitType'] == "a"){
                    $chart->setChartTitle("ampers");
                }
                else if(isset($_GET['unitType']) && $_GET['unitType'] == "w"){
                    $chart->setChartTitle("watts");
                }
                else if(isset($_GET['unitType']) && $_GET['unitType'] == "v"){
                    $chart->setChartTitle("volts");
                }

                if(isset($_GET['calcType']) && $_GET['calcType'] == "s"){
                    $chart->setChartType($chart->type[2]);
                    $chart->normalColors();
                }
                $chart->render();
            ?>
        </div>
    </div>
</div>

<!-- Aquí va lo de JavaScript -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.js"></script>

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