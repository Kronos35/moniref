<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProtoHasApliance */

$this->title = $model->Proto_idProto;
$this->params['breadcrumbs'][] = ['label' => 'Proto Has Apliances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proto-has-apliance-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Proto_idProto' => $model->Proto_idProto, 'apliance_idApliance' => $model->apliance_idApliance], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Proto_idProto' => $model->Proto_idProto, 'apliance_idApliance' => $model->apliance_idApliance], [
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
            'Proto_idProto',
            'apliance',
            'connectionDate',
            'disconnectionDate',
        ],
    ]) ?>

</div>
