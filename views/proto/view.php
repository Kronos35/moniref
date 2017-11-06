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
        echo "<h2>Actual apliance connected:</h2>";
        $protohasapliance = ProtoHasApliance::findOne( ["Proto_idProto" => $model->idProto , "disconnectionDate"=>null] );

        if($protohasapliance && $protohasapliance->disconnectionDate == null){
            echo "<table id=\"w0\" class=\"table table-striped table-bordered detail-view\">
            <tbody>
                <tr>
                    <th>Id-Proto</th>
                    <th>Apliance</th>
                    <th>Connection Date</th>
                </tr>
                <tr>";
            $apliance = Apliance::findOne(["idApliance"=> $protohasapliance->apliance_idApliance]);
            echo "<td>". $protohasapliance->Proto_idProto . "</td><td>" . $apliance->Marca . " " . $apliance->Modelo . "</td><td>" . $protohasapliance->connectionDate . "</td>";
            echo "</tr> </tbody> </table>";
        }
    ?>
    <?php echo Html::a("Change Apliance", array("/proto-has-apliance/create","id"=>$model->idProto),array("class"=>"btn btn-success")); ?>
    <?php echo Html::a("Add Apliance", array("/apliance/create","id"=>$model->idProto),array("class"=>"btn btn-success")); ?>

</div>
