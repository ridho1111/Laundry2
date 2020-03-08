<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "pelanggan".
 *
 * @property int $id
 * @property string|null $nama
 * @property string|null $jenis_kelamin
 * @property int|null $no_telp
 * @property string|null $alamat
 */
class Pelanggan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pelanggan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jenis_kelamin', 'alamat'], 'string'],
            [['no_telp'], 'integer'],
            [['nama'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'jenis_kelamin' => 'Jenis Kelamin',
            'no_telp' => 'No Telp',
            'alamat' => 'Alamat',
        ];
    }
}
