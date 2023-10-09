<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Recetas $model */

$this->title = $recetas->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Recetas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="recetas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $recetas,
        'attributes' => [
            'nombre',
            [
                'attribute' => 'descripcion',
                'label' => 'Ingredientes',
            ],
            'instrucciones:ntext',
        ],
    ]) ?>

    <p>
        <?= Html::a('Update', ['update', 'receta_id' => $recetas->receta_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'receta_id' => $recetas->receta_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
