<?php

/* @var $this yii\web\View */

$this->title = 'Moniref';
use yii\helpers\Html;

?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Moniref</h1>

        <p class="lead">Consulta el consumo de tus aparatos electrónicos.</p>

        <p><?php echo Html::a("Registrate aquí",["/user/create"],["class"=>"btn btn-success"]); ?></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>¿Como funciona?</h2>

                <p>Utilizando el dispositivo se conecta en la toma de corriente eléctrica y a través de los de esta toma se mide la corriente que pasa. Por medio de esto se puede calcular el consumo del aparato eléctrico conectado.</p>

                <p><?php echo "Aquí va un link a alguna parte"; ?></p>
            </div>
            <div class="col-lg-4">
                <h2>El prototípo</h2>

                <p>Cambiar este texto por una imágen del proto.</p>

                <p><?php echo "Aquí va el link al proto"; ?></p>
            </div>
            <div class="col-lg-4">
                <h2>Nosotros</h2>

                <p>Somos un grupo de estudiantes que cumplen con las clases día a día.</p>

                <p><?php echo Html::a("About",["site/about"],["class"=>"btn btn-default"]); ?></p>
            </div>
        </div>

    </div>
</div>
