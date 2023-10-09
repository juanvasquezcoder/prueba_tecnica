<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Solicitudesplazamercado $model */

$this->title = 'Create Solicitud';
$this->params['breadcrumbs'][] = ['label' => 'Plazas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitudesplazamercado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
