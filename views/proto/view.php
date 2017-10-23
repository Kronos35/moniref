<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Apliance;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Proto */

$this->title = $model->idProto;
$this->params['breadcrumbs'][] = ['label' => 'Protos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idProto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idProto], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idProto',
            'user_idUser',
            'password',
        ],
    ]) ?>

    <div class="proto-has-apliance-form">
        <?php $form = ActiveForm::begin(); ?>
        <?php 
            // esta linea debe irse al controlador //
            $items = ArrayHelper::map(Apliance::find()->all(), 'idApliance', 'idApliance');
        ?>
        
        <?= $form->field($model2, 'apliance_idApliance')->dropDownList($items) ?>
        <?= $form->field($model2, 'connectionDate')->textInput() ?>
        <?= $form->field($model2, 'disconnectionDate')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton($model2->isNewRecord ? 'Create' : 'Update', ['class' => $model2->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>

</div>
