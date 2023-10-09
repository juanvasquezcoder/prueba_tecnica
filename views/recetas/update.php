<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Recetas $model */

$this->title = 'Update Recetas: ' . $recetas->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Recetas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $recetas->nombre, 'url' => ['view', 'receta_id' => $recetas->receta_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="recetas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'recetas' => $recetas,
        'listaNombresIngredientes' => $listaNombresIngredientes,
    ]) ?>

</div>
