<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Menus $model */

$semanas = $fechas->fecha->semanas;
$dias = $fechas->fecha->dias;
$semanasDias = $semanas . ' - ' . $dias ;

$this->title = $semanasDias;
$this->params['breadcrumbs'][] = ['label' => 'Fechas', 'url' => ['../fechas']];
$this->params['breadcrumbs'][] = ['label' => 'Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="menus-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $menus,
        'attributes' => [
            [
                'attribute' => 'fecha_id',
                'value' => function ($fechas) {
                    // Aquí puedes personalizar la forma en que se muestra 'fecha_id'
                    return $fechas->fecha->semanas . " - " . $fechas->fecha->dias;
                },
            ],
            [
                'attribute' => 'receta_id',
                'value' => function ($recetas) {
                    return $recetas->receta->nombre;
                }
            ],
        ],
    ]) ?>

    <p>
        <?= Html::a('Update', ['update', 'menu_id' => $menus->menu_id], ['class' => 'btn btn-primary']) ?>
    </p>

</div>
