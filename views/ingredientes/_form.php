<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Ingredientes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ingredientes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($ingredientes, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= Html::label('Cantidad Disponible', 'cantidad_disponible_text', ['class' => 'control-label']) ?>
    <?= Html::textInput('cantidad_disponible_text', '', ['class' => 'form-control', 'maxlength' => true]) ?>
    <?= Html::dropDownList('cantidad_disponible_dropdown', null, [
        'litro(s)' => 'Litro(s) - (l.)',
        'gramo(s)' => 'Gramos - (gr.)',
        'libra(s)' => 'Libra(s) - (lb.)',
        'onza(s)' => 'Onza(s) - (oz.)',
        'kilo(s)' => 'Kilogramo(s) - (kg)',
        ], ['class' => 'form-control', 'prompt' => 'Selecciona una opción']) ?>


    <?= $form->field($ingredientes, 'estado')->dropDownList(
        [
            'agotado' => 'Agotado',
            'pendiente' => 'Pendiente',
            'lleno' => 'Lleno',
        ],
        ['maxlength' => true,
        'prompt' => 'Selecciona una opción'],
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
