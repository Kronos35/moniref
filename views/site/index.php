<?php

/* @var $this yii\web\View */

$this->title = 'Moniref';
use yii\helpers\Html;
use yii\bootstrap\Carousel ;

?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Moniref</h1>

        <p class="lead">Take the controll of your devices.</p>
        <?php
            echo Carousel::widget([
                'items' => [
                    [
                        'content' => Html::img("@web/img/uacjiit.jpg"),
                        'caption' => '<h4>UACJ-IIT</h4><p>Our university.</p>',
                        'options' => [],
                    ],
                    [
                        'content' => Html::img("@web/img/arduino.jpg"),
                        'caption' => '<h4>Arduino</h4><p>This is arduino project.</p>',
                        'options' => [],
                    ],
                    [
                        'content' => Html::img("@web/img/code.png"),
                        'caption' => '<h4>The code</h4><p>We follow the standars and use Yii2.</p>',
                        'options' => [],
                    ],
                    [
                        'content' => Html::img("@web/img/house.jpg"),
                        'caption' => '<h4>Controll your house</h4><p>Use Moniref to monitoring your devices.</p>',
                        'options' => [],
                    ],
                ],
                'options'=>[
                    'options'=>["class"=>"col-md-12"]
                ]
            ]);
        ?>

        <p><?php 
            if(Yii::$app->user->isGuest) echo Html::a("Signup here",["/user/create"],["class"=>"btn btn-success"]); 
        ?></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>How it works?</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                <p><?php echo Html::a("About",["site/about"],["class"=>"btn btn-default"]); ?></p>
            </div>
            <div class="col-lg-4">
                <h2>The Project</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                <p><?php echo Html::a("About",["site/about"],["class"=>"btn btn-default"]); ?></p>
            </div>
            <div class="col-lg-4">
                <h2>About Us</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                <p><?php echo Html::a("About",["site/about"],["class"=>"btn btn-default"]); ?></p>
            </div>
        </div>

    </div>
</div>
