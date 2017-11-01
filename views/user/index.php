<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Panel de usuario';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php echo Html::a("Actualizar perfil", array("/user/update"),array("class"=>"btn btn-default")); ?>
    <?php echo Html::a("Ver dispositivos", array("/proto/index"),array("class"=>"btn btn-default")); ?>
    <?php echo Html::a("Ver consumo", array("/consumptionregistry/index"),array("class"=>"btn btn-default")); ?>


</div>
