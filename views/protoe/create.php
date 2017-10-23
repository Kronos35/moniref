<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Proto */

$this->title = 'Create Proto';
$this->params['breadcrumbs'][] = ['label' => 'Protos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
