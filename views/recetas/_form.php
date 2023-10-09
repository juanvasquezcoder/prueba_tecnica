<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Recetas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="recetas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($recetas, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($recetas, 'descripcion')->checkboxList($listaNombresIngredientes, ['multiple' => true]) ?>

    <?= $form->field($recetas, 'instrucciones')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
