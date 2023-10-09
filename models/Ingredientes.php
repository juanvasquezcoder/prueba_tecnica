<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ingredientes".
 *
 * @property int $ingredientes_id
 * @property string $nombre
 * @property string $cantidad_disponible
 * @property string $estado
 *
 * @property Solicitudesplazamercado[] $solicitudesplazamercados
 */
class Ingredientes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ingredientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'cantidad_disponible', 'estado'], 'required'],
            [['nombre'], 'string', 'max' => 44],
            [['cantidad_disponible'], 'string', 'max' => 33],
            [['estado'], 'string', 'max' => 9],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ingredientes_id' => 'Ingredientes ID',
            'nombre' => 'Nombre',
            'cantidad_disponible' => 'Cantidad Disponible',
            'estado' => 'Estado',
        ];
    }

    /**
     * Gets query for [[Solicitudesplazamercados]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSolicitudesplazamercados()
    {
        return $this->hasMany(Solicitudesplazamercado::class, ['ingredientes_id' => 'ingredientes_id']);
    }
}
