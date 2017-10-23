<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Electype */

$this->title = 'Update Electype: ' . $model->idElecType;
$this->params['breadcrumbs'][] = ['label' => 'Electypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idElecType, 'url' => ['view', 'id' => $model->idElecType]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="electype-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
