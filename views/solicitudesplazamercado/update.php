<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Solicitudesplazamercado $model */

$this->title = 'Update Solicitudesplazamercado: ' . $model->solicitud_id;
$this->params['breadcrumbs'][] = ['label' => 'Solicitudesplazamercados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->solicitud_id, 'url' => ['view', 'solicitud_id' => $model->solicitud_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="solicitudesplazamercado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
