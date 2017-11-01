<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Proto;

/* @var $this yii\web\View */
/* @var $model app\models\ProtoHasApliance */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proto-has-apliance-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
    	// mover esta linea al controlador //
    	$items = ArrayHelper::map(Proto::find()->where(["user_idUser"=>Yii::$app->user->id])->all(), 'idProto', 'idProto'); 
    ?>

    <?= $form->field($model, 'Proto_idProto')->dropDownList($items); ?>

    <?= $form->field($model, 'apliance_idApliance')->textInput() ?>

    <?= $form->field($model, 'connectionDate')->textInput() ?>

    <?= $form->field($model, 'disconnectionDate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
