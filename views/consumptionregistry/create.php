<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Consumptionregistry */

$this->title = 'Create Consumptionregistry';
$this->params['breadcrumbs'][] = ['label' => 'Consumptionregistries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consumptionregistry-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
