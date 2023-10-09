<?php

use app\models\Ingredientes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\IngredientesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Ingredientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ingredientes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nombre',
            'cantidad_disponible',
            'estado',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Ingredientes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ingredientes_id' => $model->ingredientes_id]);
                 }
            ],
        ],
    ]); ?>

    <p>
        <?= Html::a('Create Ingredientes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
