<?php

use app\models\Menus;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\MenusSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Menus';
$this->params['breadcrumbs'][] = ['label' => 'Fechas', 'url' => ['../fechas']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menus-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchMenus,
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'attributes' => [
                'attribute' => 'fecha_id',
                'value' => function ($fechas) {
                    return $fechas->fecha->semanas . " - " . $fechas->fecha->dias;
                },
            ],
            [
                'attribute' => 'receta_id',
                'value' => function ($recetas) {
                    return $recetas->receta->nombre;
                }
            ],
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update}',
                'urlCreator' => function ($action, Menus $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'menu_id' => $model->menu_id]);
                 }
            ],
        ],
    ]); ?>
</div>
