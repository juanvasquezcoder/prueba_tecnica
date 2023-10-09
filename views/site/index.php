<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="titulo-principal">Bienvenido!</h1>

        <p class="instruccion">Elija que accion quiere hacer</p>

    </div>

    <div class="body-content-principal">

    <?= Html::a('Menus', ['../fechas'] ,['class' => 'btn btn-principal']) ?>

    <?= Html::a('Recetas', ['../recetas'] ,['class' => 'btn btn-principal']) ?>

    <?= Html::a('Ingredientes', ['../ingredientes'] ,['class' => 'btn btn-principal']) ?>

    <?= Html::a('Solicitudes', ['../solicitudesplazamercado'] ,['class' => 'btn btn-principal']) ?>

    </div>
</div>
