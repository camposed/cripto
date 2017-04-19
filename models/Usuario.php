<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $idusuario
 * @property string $nombre
 * @property string $apellido
 * @property string $email
 * @property string $pass
 * @property integer $activo
 * @property integer $intentos
 *
 * @property Log[] $logs
 * @property Notas[] $notas
 * @property Site[] $sites
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['activo', 'intentos'], 'integer'],
            [['nombre', 'apellido'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 30],
            [['pass'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idusuario' => 'Idusuario',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'email' => 'Email',
            'pass' => 'Pass',
            'activo' => 'Activo',
            'intentos' => 'Intentos',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogs()
    {
        return $this->hasMany(Log::className(), ['idusuario' => 'idusuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotas()
    {
        return $this->hasMany(Notas::className(), ['idusuario' => 'idusuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSites()
    {
        return $this->hasMany(Site::className(), ['idusuario' => 'idusuario']);
    }
}
