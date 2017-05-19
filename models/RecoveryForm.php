<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Usuario;
use kartik\password\StrengthValidator;

/**
* RegistroForm is the model behind the registro form.
*
* @property User|null $user This property is read-only.
*
*/
class RegistroForm extends Model
{
  public $nombre;
  public $apellido;
  public $email;
  public $password;
  public $password_repetir;
  public $frase_clave;

  /**
  * @return array the validation rules.
  */
  public function rules()
  {
    return [
      // email and password 
      // email and pas_repetirsword are both required
      [['nombre', 'apellido', 'email', 'password','password_repetir'], 'required'],
      // rememberMe must be a boolean value
      ['email', 'email'],
      [['nombre', 'apellido'], 'string', 'max' => 20],
      [['password'], StrengthValidator::className(), 'preset'=>'normal', 'userAttribute'=>'email'],
      [['email'], 'string', 'max' => 40],
      [['password'], 'string', 'max' => 20],
      ['password_repetir', 'compare', 'compareAttribute'=>'password', 'message'=>'Las contraseñas no coinciden'],
      [['frase_clave'], 'string', 'max' => 40],
    ];
  }


  public function attributeLabels()
    {
        return [
            'password_repetir' => 'Repetir Contraseña',
            'password' => 'Contraseña',
        ];
    }

  /**
  * Validates the password.
  * This method serves as the inline validation for password.
  *
  * @param string $attribute the attribute currently being validated
  * @param array $params the additional name-value pairs given in the rule
  */
  
  /**
  * Logs in a user using the provided email and password.
  * @return bool whether the user is logged in successfully
  */
  public function registrar()
  {
    $dbUsuario = Usuario::find()->where('email = :user', [':user'=>$this->email])->one();
    if(count($dbUsuario)>0){
        $this->addError('email', 'El email ingresado ya esta en uso');
        return false;
    }
    if($this->validate()){
      $dbUsuario = new Usuario();
      $dbUsuario->nombre = $this->nombre;
      $dbUsuario->apellido = $this->apellido;
      $dbUsuario->email = $this->email;
      $dbUsuario->pass = hash("sha256", $this->password);
      $dbUsuario->clave_cifrado = $this->frase_clave;

      if($dbUsuario->save()){
        Yii::$app->session->setFlash('registro_exito', '¡Se ha registrado con exito!');      
        return true;
      }else{
        Yii::$app->session->setFlash('registro_error', 'Ha ocurrido un error durante el registro, intente de nuevo');
        return false;
      }
    }
  }

  /**
  * Finds user by [[email]]
  *
  * @return User|null
  */
  public function getUser()
  {
    if ($this->_user === false) {
      $this->_user = Usuario::findByUsername($this->email);
    }

    return $this->_user;
  }
}
