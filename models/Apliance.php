<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "apliance".
 *
 * @property integer $idApliance
 * @property integer $elecType_idElecType
 * @property string $Marca
 * @property string $Modelo
 *
 * @property Electype $elecTypeIdElecType
 * @property Consumptionregistry[] $consumptionregistries
 * @property ProtoHasApliance[] $protoHasApliances
 * @property Proto[] $protoIdProtos
 */
class Apliance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'apliance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['elecType_idElecType'], 'integer'],
            [['Marca', 'Modelo'], 'string', 'max' => 45],
            [['elecType_idElecType'], 'exist', 'skipOnError' => true, 'targetClass' => Electype::className(), 'targetAttribute' => ['elecType_idElecType' => 'idElecType']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idApliance' => 'Id Apliance',
            'elecType_idElecType' => 'Elec Type Id Elec Type',
            'Marca' => 'Marca',
            'Modelo' => 'Modelo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getElecTypeIdElecType()
    {
        return $this->hasOne(Electype::className(), ['idElecType' => 'elecType_idElecType']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsumptionregistries()
    {
        return $this->hasMany(Consumptionregistry::className(), ['apliance_idApliance' => 'idApliance']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProtoHasApliances()
    {
        return $this->hasMany(ProtoHasApliance::className(), ['apliance_idApliance' => 'idApliance']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProtoIdProtos()
    {
        return $this->hasMany(Proto::className(), ['idProto' => 'Proto_idProto'])->viaTable('proto_has_apliance', ['apliance_idApliance' => 'idApliance']);
    }

    public function getUserId(){
        return ProtoHasApliance::findOne(["apliance_idApliance"=>$this->idApliance])->userId;
    }

    public function getElecType(){
        return Electype::findOne(["idElecType"=>$this->elecType_idElecType])->Nombre;
    }
}
