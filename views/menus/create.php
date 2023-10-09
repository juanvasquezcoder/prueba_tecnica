<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Menus $model */

$this->title = 'Create Menus';
$this->params['breadcrumbs'][] = ['label' => 'Fechas', 'url' => ['../fechas']];
$this->params['breadcrumbs'][] = ['label' => 'Menuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menus-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'menus' => $menus,
        'listaNombresRecetas' => $listaNombresRecetas,
    ]) ?>

</div>
