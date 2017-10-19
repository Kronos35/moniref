<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Consumptionregistry */

$this->title = 'Update Consumptionregistry: ' . $model->idConsumption;
$this->params['breadcrumbs'][] = ['label' => 'Consumptionregistries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idConsumption, 'url' => ['view', 'id' => $model->idConsumption]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="consumptionregistry-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
