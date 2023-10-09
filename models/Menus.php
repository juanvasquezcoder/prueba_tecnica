<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menus".
 *
 * @property int $menu_id
 * @property int|null $fecha_id
 * @property int|null $receta_id
 *
 * @property Fechas $fecha
 * @property Recetas $receta
 */
class Menus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha_id', 'receta_id'], 'integer'],
            [['fecha_id'], 'exist', 'skipOnError' => true, 'targetClass' => Fechas::class, 'targetAttribute' => ['fecha_id' => 'fecha_id']],
            [['receta_id'], 'exist', 'skipOnError' => true, 'targetClass' => Recetas::class, 'targetAttribute' => ['receta_id' => 'receta_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'menu_id' => 'Menu ID',
            'fecha_id' => 'Fecha ID',
            'receta_id' => 'Receta ID',
        ];
    }

    /**
     * Gets query for [[Fecha]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFecha()
    {
        return $this->hasOne(Fechas::class, ['fecha_id' => 'fecha_id']);
    }

    /**
     * Gets query for [[Receta]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReceta()
    {
        return $this->hasOne(Recetas::class, ['receta_id' => 'receta_id']);
    }
}
