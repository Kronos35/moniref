<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Consumptionregistry */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="consumptionregistry-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'apliance_idApliance')->textInput() ?>

    <?= $form->field($model, 'watts')->textInput() ?>

    <?= $form->field($model, 'amps')->textInput() ?>

    <?= $form->field($model, 'volts')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
