<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Proto Has Apliances';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proto-has-apliance-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Proto Has Apliance', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Proto_idProto',
            'apliance_idApliance',
            'connectionDate',
            'disconnectionDate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
