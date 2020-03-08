<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "karyawan".
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $jenis_kelamin
 * @property string|null $no_telp
 * @property string|null $agama
 * @property string|null $tempat_tanggal_lahir
 * @property string|null $tanggal_gabung
 * @property int|null $usia
 * @property string|null $status
 * @property string|null $alamat
 * @property string|null $password
 * @property string|null $email
 */
class Karyawan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'karyawan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jenis_kelamin', 'agama', 'alamat'], 'string'],
            [['tanggal_gabung'], 'safe'],
            [['usia'], 'integer'],
            [['username', 'no_telp', 'tempat_tanggal_lahir', 'status',], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'jenis_kelamin' => 'Jenis Kelamin',
            'no_telp' => 'No Telp',
            'agama' => 'Agama',
            'tempat_tanggal_lahir' => 'Tempat Tanggal Lahir',
            'tanggal_gabung' => 'Tanggal Gabung',
            'usia' => 'Usia',
            'status' => 'Status',
            'alamat' => 'Alamat',
        ];
    }
}
