<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Apliances';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apliance-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Apliance', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'idApliance',
            'elecType',
            'Marca',
            'Modelo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
