<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "transaksi".
 *
 * @property int $id
 * @property string|null $id_karyawan
 * @property string|null $id_pelanggan
 * @property string|null $tanggal_masuk
 * @property string|null $estimasi
 * @property string|null $total_berat
 * @property string|null $harga_per_kilo
 * @property string|null $total_harga
 * @property string|null $status
 * @property string|null $tanggal_selesai
 */
class Transaksi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaksi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal_masuk','tanggal_selesai'], 'safe'],
            [['status'], 'string'],
            [['id_karyawan', 'id_pelanggan', 'total_berat', 'harga_per_kilo', 'estimasi', 'total_harga'], 'integer']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_karyawan' => 'Id Karyawan',
            'id_pelanggan' => 'Id Pelanggan',
            'tanggal_masuk' => 'Tanggal Masuk',
            'estimasi' => 'Estimasi',
            'total_berat' => 'Total Berat',
            'harga_per_kilo' => 'Harga Per Kilo',
            'total_harga' => 'Total Harga',
            'status' => 'Status',
            'tanggal_selesai' => 'Tanggal Selesai',
        ];
    }
    public function getPelanggan()
    {
        return $this->hasOne(Pelanggan::className(), ['id' => 'id_pelanggan']);
    }
}
