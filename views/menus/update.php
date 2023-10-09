<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Menus $model */

$semanas = $fechas->fecha->semanas;
$dias = $fechas->fecha->dias;
$semanasDias = $semanas . ' - ' . $dias ;

$this->title = 'Actualizar Menu: ' . $semanasDias;
$this->params['breadcrumbs'][] = ['label' => 'Fechas', 'url' => ['../fechas']];
$this->params['breadcrumbs'][] = ['label' => 'Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $semanasDias, 'url' => ['view', 'menu_id' => $menus->menu_id]];
$this->params['breadcrumbs'][] = 'Update'; 
?>
<div class="menus-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'menus' => $menus,
        'listaNombresRecetas' => $listaNombresRecetas,
    ]) ?>

</div>
