<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consumptionregistries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consumptionregistry-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Consumptionregistry', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idConsumption',
            'apliance_idApliance',
            'watts',
            'amps',
            'volts',
            // 'date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
