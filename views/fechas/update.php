<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Fechas $model */

$this->title = 'Update Fechas: ' . $model->fecha_id;
$this->params['breadcrumbs'][] = ['label' => 'Fechas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fecha_id, 'url' => ['view', 'fecha_id' => $model->fecha_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fechas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
