<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Solicitudesplazamercado $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="solicitudesplazamercado-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha')->input('date', ['format' => 'yyyy-MM-dd']) ?>

    <?= $form->field($model, 'nombre_ingrediente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cantidad')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
