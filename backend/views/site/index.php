<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Тестовое задание Yii2</h1>

        <p>
			<?= Html::a('Authors', ['author/index'], ['class' => 'btn btn-lg btn-success']) ?>
			<?= Html::a('Books', ['book/index'], ['class' => 'btn btn-lg btn-success']) ?>
        </p>
    </div>

    <div class="body-content">
    </div>
</div>
