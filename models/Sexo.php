<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sexo".
 *
 * @property integer $id_sexo
 * @property string $nombre
 *
 * @property Usuarios[] $usuarios
 */
class Sexo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sexo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_sexo' => 'Id Sexo',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuarios::className(), ['id_sexo' => 'id_sexo']);
    }

    /**
     * @inheritdoc
     * @return SexoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SexoQuery(get_called_class());
    }
}
