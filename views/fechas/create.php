<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Fechas $model */

$this->title = 'Create Fechas';
$this->params['breadcrumbs'][] = ['label' => 'Fechas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fechas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'fechas' => $fechas,
        'semanas' => $semanas,
    ]) ?>

</div>
