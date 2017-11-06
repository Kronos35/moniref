<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Menu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php echo Html::a("Update Profile", array("/user/update"),array("class"=>"btn btn-default")); ?>
    <?php echo Html::a("Devices", array("/proto/index"),array("class"=>"btn btn-default")); ?>
    <?php echo Html::a("Apliance", array("/apliance/index"),array("class"=>"btn btn-default")); ?>
    <?php echo Html::a("Consumption Registry", array("/consumptionregistry/index"),array("class"=>"btn btn-default")); ?>


</div>
