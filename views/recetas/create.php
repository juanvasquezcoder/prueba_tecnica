<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Recetas $model */

$this->title = 'Create Recetas';
$this->params['breadcrumbs'][] = ['label' => 'Recetas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recetas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'recetas' => $recetas,
        'listaNombresIngredientes' => $listaNombresIngredientes
    ]) ?>

</div>
