<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "electype".
 *
 * @property integer $idElecType
 * @property string $Nombre
 *
 * @property Apliance[] $apliances
 */
class Electype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'electype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idElecType'], 'required'],
            [['idElecType'], 'integer'],
            [['Nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idElecType' => 'Id Elec Type',
            'Nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApliances()
    {
        return $this->hasMany(Apliance::className(), ['elecType_idElecType' => 'idElecType']);
    }
}
