<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notas".
 *
 * @property integer $idnota
 * @property string $titulo
 * @property string $nota
 * @property integer $idusuario
 *
 * @property Usuario $idusuario0
 */
class Notas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titulo'], 'required'],
            [['nota'], 'string'],
            [['idusuario'], 'integer'],
            [['titulo'], 'string', 'max' => 50],
            [['idusuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['idusuario' => 'idusuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idnota' => 'Idnota',
            'titulo' => 'Titulo',
            'nota' => 'Nota',
            'idusuario' => 'Idusuario',
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
