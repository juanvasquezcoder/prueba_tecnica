<?php

use app\models\Fechas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\FechasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Fechas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fechas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchFechas,
        'summary' => '',
        'columns' => [
            'semanas',
            'dias',
            [
                'class' => ActionColumn::className(),
                'template' => '{menus}', // Define el formato de los botones
                'buttons' => [
                    'menus' => function ($url, $fechas, $key) {
                        return Html::a('Recetas', ['../menus'], [
                            'class' => 'btn-grid',
                            'title' => 'Visualizar todas las recetas',
                        ]);
                    },
                ],
                'urlCreator' => function ($action, Fechas $fechas, $key, $index, $column) {
                    return Url::toRoute([$action, 'fecha_id' => $fechas->fecha_id]);
                 }
            ],
        ],
    ]); ?>

    <p>
        <?= Html::a('Crear Fechas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
    
