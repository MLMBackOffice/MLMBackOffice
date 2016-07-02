<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property integer $id_usuario
 * @property string $nombre
 * @property integer $id_patrocinador
 * @property integer $estado
 * @property string $apellidos
 * @property string $direccion
 * @property string $telefono
 * @property string $llave_publica
 *
 * @property Compra[] $compras
 * @property Nivel[] $nivels
 * @property Usuarios $idPatrocinador
 * @property Usuarios[] $usuarios
 */
class Usuarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario', 'nombre', 'estado', 'llave_publica'], 'required'],
            [['id_usuario', 'id_patrocinador', 'estado'], 'integer'],
            [['nombre', 'direccion', 'telefono'], 'string', 'max' => 50],
            [['apellidos'], 'string', 'max' => 100],
            [['llave_publica'], 'string', 'max' => 34],
            [['id_usuario'], 'unique'],
            [['id_patrocinador'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['id_patrocinador' => 'id_usuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id Usuario',
            'nombre' => 'Nombre',
            'id_patrocinador' => 'Id Patrocinador',
            'estado' => 'Estado',
            'apellidos' => 'Apellidos',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'llave_publica' => 'Llave Publica',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompras()
    {
        return $this->hasMany(Compra::className(), ['id_usuario' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNivels()
    {
        return $this->hasMany(Nivel::className(), ['usuarios_id_usuario' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPatrocinador()
    {
        return $this->hasOne(Usuarios::className(), ['id_usuario' => 'id_patrocinador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuarios::className(), ['id_patrocinador' => 'id_usuario']);
    }

    /**
     * @inheritdoc
     * @return UsuariosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsuariosQuery(get_called_class());
    }
}
