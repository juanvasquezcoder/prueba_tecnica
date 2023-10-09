<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fechas".
 *
 * @property int $fecha_id
 * @property string $dias
 * @property string $semanas
 *
 * @property Menus[] $menuses
 * @property Solicitudesplazamercado[] $solicitudesplazamercados
 */
class Fechas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fechas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dias', 'semanas'], 'required'],
            [['dias', 'semanas'], 'string', 'max' => 9],
            // ... otras reglas de validación ...
            ['semanas', 'validateCamposExisten'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fecha_id' => 'Fecha ID',
            'dias' => 'Dias',
            'semanas' => 'Semanas',
        ];
    }

    /**
     * Gets query for [[Menuses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMenuses()
    {
        return $this->hasMany(Menus::class, ['fecha_id' => 'fecha_id']);
    }

    /**
     * Gets query for [[Solicitudesplazamercados]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSolicitudesplazamercados()
    {
        return $this->hasMany(Solicitudesplazamercado::class, ['fecha_id' => 'fecha_id']);
    }

    // ============================= Codigo puesto por mi =============================

    public function validateCamposExisten($attribute, $params)
    {
        // Verifica si los campos ya existen en la base de datos
        $existe = Fechas::find()
            ->where(['dias' => $this->dias, 'semanas' => $this->semanas])
            ->exists();

        if ($existe) {
            $this->addError($attribute, 'Esta fechas ya existe');
        }
    }
}
