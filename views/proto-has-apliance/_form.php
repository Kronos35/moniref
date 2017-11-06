<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Proto;
use app\models\Apliance;

/* @var $this yii\web\View */
/* @var $model app\models\ProtoHasApliance */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proto-has-apliance-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
        $items = array();
        foreach (Apliance::find()->where(["user_idUser"=>Yii::$app->user->id])->all() as $mod) {
            $items[$mod->idApliance] = $mod->Marca . " " . $mod->Modelo;
        }
        
    ?>

    <?= $form->field($model, 'apliance_idApliance')->dropDownList($items); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
