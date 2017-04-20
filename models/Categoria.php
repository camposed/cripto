<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categoria".
 *
 * @property integer $idcategoria
 * @property string $categoria
 *
 * @property Site[] $sites
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categoria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categoria'], 'required'],
            [['categoria'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcategoria' => 'Categoria',
            'categoria' => 'Categoria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSites()
    {
        return $this->hasMany(Site::className(), ['idcategoria' => 'idcategoria']);
    }
}
