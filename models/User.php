<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $idUser
 * @property string $name
 * @property string $lastName
 * @property string $mail
 * @property string $password
 * @property integer $phone
 * @property double $Tarifa
 *
 * @property Proto[] $protos
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mail', 'Tarifa'], 'required'],
            [['phone'], 'integer'],
            [['Tarifa'], 'number'],
            [['name', 'lastName', 'mail', 'password'], 'string', 'max' => 45],
            [['mail'], 'unique'],
            [['phone'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idUser' => 'Id User',
            'name' => 'Name',
            'lastName' => 'Last Name',
            'mail' => 'Mail',
            'password' => 'Password',
            'phone' => 'Phone',
            'Tarifa' => 'Tarifa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProtos()
    {
        return $this->hasMany(Proto::className(), ['user_idUser' => 'idUser']);
    }

    public static function findByUsername($name){
        return User::findOne(["mail"=>$name]);
    }

    public function validatePassword($pass){
        return $this->password === $pass;
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }
    public function getId()
    {
        return $this->idUser;
    }
    public function getAuthKey()
    {
        return "Sepa la wea + random " . rand();//$this->authKey;
    }
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }
}
