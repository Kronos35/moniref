<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Consumptionregistry */

$this->title = $model->idConsumption;
$this->params['breadcrumbs'][] = ['label' => 'Consumptionregistries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consumptionregistry-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idConsumption], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idConsumption], [
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
            'idConsumption',
            'apliance_idApliance',
            'watts',
            'amps',
            'volts',
            'date',
        ],
    ]) ?>

</div>
