<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "solicitudesplazamercado".
 *
 * @property int $solicitud_id
 * @property string $fecha
 * @property string $nombre_ingrediente
 * @property string $cantidad
 */
class Solicitudesplazamercado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'solicitudesplazamercado';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha', 'nombre_ingrediente', 'cantidad'], 'required'],
            [['solicitud_id'], 'integer'],
            [['fecha'], 'safe'],
            [['nombre_ingrediente'], 'string', 'max' => 50],
            [['cantidad'], 'string', 'max' => 7],
            [['solicitud_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'solicitud_id' => 'Solicitud ID',
            'fecha' => 'Fecha',
            'nombre_ingrediente' => 'Nombre Ingrediente',
            'cantidad' => 'Cantidad',
        ];
    }
}
