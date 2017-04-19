<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "log".
 *
 * @property integer $idlog
 * @property integer $idusuario
 * @property string $fecha
 * @property string $os
 * @property string $nombre_host
 * @property string $tipo_maquina
 * @property string $version
 * @property string $ip
 *
 * @property Usuario $idusuario0
 */
class Log extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idusuario'], 'integer'],
            [['fecha'], 'safe'],
            [['os', 'nombre_host', 'tipo_maquina'], 'string', 'max' => 30],
            [['version'], 'string', 'max' => 50],
            [['ip'], 'string', 'max' => 16],
            [['idusuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['idusuario' => 'idusuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idlog' => 'Idlog',
            'idusuario' => 'Idusuario',
            'fecha' => 'Fecha',
            'os' => 'Os',
            'nombre_host' => 'Nombre Host',
            'tipo_maquina' => 'Tipo Maquina',
            'version' => 'Version',
            'ip' => 'Ip',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdusuario0()
    {
        return $this->hasOne(Usuario::className(), ['idusuario' => 'idusuario']);
    }
}
