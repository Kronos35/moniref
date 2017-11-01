<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Apliance;
use app\models\ProtoHasApliance;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Proto */

$this->title = $model->idProto;
$this->params['breadcrumbs'][] = ['label' => 'Protos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idProto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idProto], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?php echo Html::a("Add Apliance", array("/apliance/create","id"=>$model->idProto),array("class"=>"btn btn-default")); ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idProto',
            'user_idUser',
            'password',
        ],
    ]) ?>

    <?php
        echo "<h2>actual apliance connected:</h2>";
        $protohasapliance = ProtoHasApliance::findOne( ["Proto_idProto" => $model->idProto] );
        if($protohasapliance && $protohasapliance->disconnectionDate == null){
            $apliance = Apliance::findOne(["idApliance"=> $protohasapliance->apliance_idApliance]);
            echo "<b>id-proto</b>.......<b>apliance</b>.......<b>conection date</b><br>";
            echo $protohasapliance->Proto_idProto . "......." . $apliance->Marca . " " . $apliance->Modelo . "......." . $protohasapliance->connectionDate . "<br>";
        }
    ?>
    <?php echo Html::a("Change Apliance", array("/proto-has-apliance/create","id"=>$model->idProto),array("class"=>"btn btn-default")); ?>

</div>
