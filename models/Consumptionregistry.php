<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "consumptionregistry".
 *
 * @property integer $idConsumption
 * @property integer $apliance_idApliance
 * @property double $watts
 * @property double $amps
 * @property double $volts
 * @property string $date
 *
 * @property Apliance $aplianceIdApliance
 */
class Consumptionregistry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'consumptionregistry';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['apliance_idApliance', 'watts', 'amps', 'volts', 'date'], 'required'],
            [['apliance_idApliance'], 'integer'],
            [['watts', 'amps', 'volts'], 'number'],
            [['date'], 'safe'],
            [['apliance_idApliance'], 'exist', 'skipOnError' => true, 'targetClass' => Apliance::className(), 'targetAttribute' => ['apliance_idApliance' => 'idApliance']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idConsumption' => 'Id Consumption',
            'apliance_idApliance' => 'Apliance Id Apliance',
            'watts' => 'Watts',
            'amps' => 'Amps',
            'volts' => 'Volts',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAplianceIdApliance()
    {
        return $this->hasOne(Apliance::className(), ['idApliance' => 'apliance_idApliance']);
    }

    public function getUserId(){
        return Apliance::findOne(["idApliance"=>$this->apliance_idApliance])->userId;
    }
}
