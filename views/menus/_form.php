<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Menus $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="menus-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($menus, 'receta_id')->label('Elija una receta')->dropDownList($listaNombresRecetas, ['prompt' => 'Selecciona una opción']) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
