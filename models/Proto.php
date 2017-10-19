<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proto".
 *
 * @property integer $idProto
 * @property integer $user_idUser
 * @property string $password
 *
 * @property User $userIdUser
 * @property ProtoHasApliance[] $protoHasApliances
 * @property Apliance[] $aplianceIdApliances
 */
class Proto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idProto', 'user_idUser'], 'required'],
            [['idProto', 'user_idUser'], 'integer'],
            [['password'], 'string', 'max' => 45],
            [['user_idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_idUser' => 'idUser']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idProto' => 'Id Proto',
            'user_idUser' => 'User Id User',
            'password' => 'Password',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserIdUser()
    {
        return $this->hasOne(User::className(), ['idUser' => 'user_idUser']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProtoHasApliances()
    {
        return $this->hasMany(ProtoHasApliance::className(), ['Proto_idProto' => 'idProto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAplianceIdApliances()
    {
        return $this->hasMany(Apliance::className(), ['idApliance' => 'apliance_idApliance'])->viaTable('proto_has_apliance', ['Proto_idProto' => 'idProto']);
    }
}
