<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Solicitudesplazamercado $model */

$this->title = $model->solicitud_id;
$this->params['breadcrumbs'][] = ['label' => 'Solicitudesplazamercados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="solicitudesplazamercado-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'solicitud_id' => $model->solicitud_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'solicitud_id' => $model->solicitud_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'solicitud_id',
            'fecha',
            'nombre_ingrediente',
            'cantidad',
        ],
    ]) ?>

</div>
