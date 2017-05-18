<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use kartik\password\StrengthValidator;

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
 * @property integer $clave_cifrado
 *
 * @property Log[] $logs
 * @property Notas[] $notas
 * @property Site[] $sites
 */
class Usuario extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public $authKey;

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
            [['nombre','apellido'], 'required', 'on' => 'update'],
            [['pass'], StrengthValidator::className(), 'preset'=>'normal', 'userAttribute'=>'email', 'on' => 'password'],
            [['nombre', 'apellido'], 'string', 'max' => 25, 'on' => 'update'],
            [['pass'], 'string', 'max' => 20, 'on' => 'password'],
            [['pass'], 'required', 'on' => 'password'],
            [['email'], 'email', 'on' => 'create'],
            [['email'], 'string', 'max' => 40, 'on' => 'create'],
            [['clave_cifrado'], 'string', 'max' => 40, 'on' => 'create'],
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
            'pass' => 'Password',
            'activo' => 'Activo',
            'intentos' => 'Intentos',
            'clave_cifrado' => 'Clave de Cifrado',
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

    public static function findByUsername($username)
    {
        return static::findOne(['email' => $username]);
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
          return static::findOne(['access_token' => $token]);
    }

    public static function findByPasswordResetToken($token)
    {
       $expire = \Yii::$app->params['user.passwordResetTokenExpire'];
       $parts = explode('_', $token);
       $timestamp = (int) end($parts);
       if ($timestamp + $expire < time()) {
           // token expired
           return null;
       }

       return static::findOne([
           'password_reset_token' => $token
       ]);
    }

    public function getId()
    {
       return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
       return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
       return $this->getAuthKey() === $authKey;
    }
}
