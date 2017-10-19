<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Apliance */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="apliance-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idApliance')->textInput() ?>

    <?= $form->field($model, 'elecType_idElecType')->textInput() ?>

    <?= $form->field($model, 'Marca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Modelo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
