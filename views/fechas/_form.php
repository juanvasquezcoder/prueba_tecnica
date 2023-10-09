<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Fechas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="fechas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($fechas, 'semanas')->dropDownList(
        [
            'semana 1' => 'Semana 1',
            'semana 2' => 'Semana 2',
            'semana 3' => 'Semana 3',
            'semana 4' => 'Semana 4',
            'semana 5' => 'Semana 5',
        ],
        ['prompt' => 'Selecciona una semana']
    ) ?>

    <?= $form->field($fechas, 'dias')->dropDownList(
        [
            'lunes' => 'Lunes',
            'martes' => 'Martes',
            'miercoles' => 'Miercoles',
            'jueves' => 'Jueves',
            'vierenes' => 'Viernes',
            'sabado' => 'Sabado',
            'domingo' => 'Domingo',
        ],
        ['prompt' => 'Selecciona un dia']
    ) ?>

    <div class="form-group form-group-btn">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-success-form']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
