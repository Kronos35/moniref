<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProtoHasApliance */

$this->title = 'Create Proto Has Apliance';
$this->params['breadcrumbs'][] = ['label' => 'Proto Has Apliances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proto-has-apliance-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
