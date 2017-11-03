<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Apliance */

$this->title = 'Create Apliance';
$this->params['breadcrumbs'][] = ['label' => 'Apliances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apliance-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        //'id' => $id,
    ]) ?>

</div>
