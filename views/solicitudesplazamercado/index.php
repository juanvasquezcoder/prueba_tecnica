<?php

use app\models\Solicitudesplazamercado;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SolicitudesplazamercadoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Plazas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitudesplazamercado-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'fecha',
            'nombre_ingrediente',
            'cantidad',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Solicitudesplazamercado $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'solicitud_id' => $model->solicitud_id]);
                 }
            ],
        ],
    ]); ?>


</div>
