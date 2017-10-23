<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proto_has_apliance".
 *
 * @property integer $Proto_idProto
 * @property integer $apliance_idApliance
 * @property string $connectionDate
 * @property string $disconnectionDate
 *
 * @property Proto $protoIdProto
 * @property Apliance $aplianceIdApliance
 */
class ProtoHasApliance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proto_has_apliance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Proto_idProto', 'apliance_idApliance'], 'required'],
            [['Proto_idProto', 'apliance_idApliance'], 'integer'],
            [['connectionDate', 'disconnectionDate'], 'safe'],
            [['Proto_idProto'], 'exist', 'skipOnError' => true, 'targetClass' => Proto::className(), 'targetAttribute' => ['Proto_idProto' => 'idProto']],
            [['apliance_idApliance'], 'exist', 'skipOnError' => true, 'targetClass' => Apliance::className(), 'targetAttribute' => ['apliance_idApliance' => 'idApliance']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Proto_idProto' => 'Proto Id Proto',
            'apliance_idApliance' => 'Apliance Id Apliance',
            'connectionDate' => 'Connection Date',
            'disconnectionDate' => 'Disconnection Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProtoIdProto()
    {
        return $this->hasOne(Proto::className(), ['idProto' => 'Proto_idProto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAplianceIdApliance()
    {
        return $this->hasOne(Apliance::className(), ['idApliance' => 'apliance_idApliance']);
    }
}
