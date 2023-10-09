<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Ingredientes $model */

$this->title = $ingredientes->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Ingredientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ingredientes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $ingredientes,
        'attributes' => [
            'nombre',
            'cantidad_disponible',
            'estado',
        ],
    ]) ?>

    <p>
        <?= Html::a('Update', ['update', 'ingredientes_id' => $ingredientes->ingredientes_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ingredientes_id' => $ingredientes->ingredientes_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
