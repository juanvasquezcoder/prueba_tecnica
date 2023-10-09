<?php

use app\models\Recetas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\RecetasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Recetas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recetas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nombre',
            [
                'attribute' => 'descripcion',
                'label' => 'Ingredientes',
            ],
            'instrucciones:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Recetas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'receta_id' => $model->receta_id]);
                 }
            ],
        ],
    ]); ?>
    <p>
        <?= Html::a('Create Recetas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


</div>
