<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "site".
 *
 * @property integer $idsite
 * @property string $url
 * @property string $nom_site
 * @property string $nom_user
 * @property string $pass_user
 * @property string $notas
 * @property integer $idcategoria
 * @property integer $idusuario
 *
 * @property Categoria $idcategoria0
 * @property Usuario $idusuario0
 */
class Site extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'site';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcategoria', 'idusuario'], 'integer'],
            [['url'], 'string', 'max' => 200],
            [['nom_site', 'nom_user'], 'string', 'max' => 50],
            [['pass_user', 'notas'], 'string', 'max' => 255],
            [['idcategoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['idcategoria' => 'idcategoria']],
            [['idusuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['idusuario' => 'idusuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idsite' => 'Idsite',
            'url' => 'Url',
            'nom_site' => 'Nom Site',
            'nom_user' => 'Nom User',
            'pass_user' => 'Pass User',
            'notas' => 'Notas',
            'idcategoria' => 'Idcategoria',
            'idusuario' => 'Idusuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdcategoria0()
    {
        return $this->hasOne(Categoria::className(), ['idcategoria' => 'idcategoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdusuario0()
    {
        return $this->hasOne(Usuario::className(), ['idusuario' => 'idusuario']);
    }
}