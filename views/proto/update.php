<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Proto */

$this->title = 'Update Proto: ' . $model->idProto;
$this->params['breadcrumbs'][] = ['label' => 'Protos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idProto, 'url' => ['view', 'id' => $model->idProto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="proto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
