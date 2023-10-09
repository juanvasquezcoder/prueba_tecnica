<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Ingredientes $model */

$this->title = 'Actualizar Ingrediente: ' . $ingredientes->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Ingredientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $ingredientes->nombre, 'url' => ['view', 'ingredientes_id' => $ingredientes->ingredientes_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ingredientes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'ingredientes' => $ingredientes,
    ]) ?>

</div>
