<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProtoHasApliance */

$this->title = 'Update Proto Has Apliance: ' . $model->Proto_idProto;
$this->params['breadcrumbs'][] = ['label' => 'Proto Has Apliances', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Proto_idProto, 'url' => ['view', 'Proto_idProto' => $model->Proto_idProto, 'apliance_idApliance' => $model->apliance_idApliance]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="proto-has-apliance-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
