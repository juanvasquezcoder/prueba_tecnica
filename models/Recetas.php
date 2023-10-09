<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recetas".
 *
 * @property int $receta_id
 * @property string $nombre
 * @property string $descripcion
 * @property string $instrucciones
 *
 * @property Menus[] $menuses
 */
class Recetas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recetas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion', 'instrucciones'], 'required'],
            [['instrucciones'], 'string'],
            [['nombre'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'receta_id' => 'Receta ID',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'instrucciones' => 'Instrucciones',
        ];
    }

    /**
     * Gets query for [[Menuses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMenuses()
    {
        return $this->hasMany(Menus::class, ['receta_id' => 'receta_id']);
    }
}
