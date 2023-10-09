<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Ingredientes $model */

$this->title = 'Create Ingredientes';
$this->params['breadcrumbs'][] = ['label' => 'Ingredientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ingredientes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'ingredientes' => $ingredientes,
    ]) ?>

</div>
