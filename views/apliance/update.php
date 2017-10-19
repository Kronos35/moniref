<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Apliance */

$this->title = 'Update Apliance: ' . $model->idApliance;
$this->params['breadcrumbs'][] = ['label' => 'Apliances', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idApliance, 'url' => ['view', 'id' => $model->idApliance]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="apliance-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
