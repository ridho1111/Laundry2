<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transaksis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Transaksi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'id_karyawan',
            [
                'attribute' => 'id_pelanggan',
                'value' => 'pelanggan.nama',
                'filter' => Html::dropDownList('id_pelanggan',Yii::$app->request->get('id_pelanggan'),$Pelanggan,['class' => 'form-control', 'prompt'=>'-Pilih Pelanggan-'])
            ],
            
            [ 
                'attribute' => 'tanggal_masuk',
            'filter' => Html::textInput('tanggal_masuk',Yii::$app->request->get('tanggal_masuk'),['class' => 'form-control']),
            ],
            [ 
                'attribute' => 'estimasi',
            'filter' => Html::textInput('estimasi',Yii::$app->request->get('estimasi'),['class' => 'form-control']),
            ],
           [
                'attribute' => 'total_berat',
                'filter' => Html::textInput('total_berat',Yii::$app->request->get('total_berat'),['class' => 'form-control']),
            ],
            'harga_per_kilo',
            'total_harga',
            'status',

             [ 
                'attribute' => 'tanggal_selesai',
                'filter' => Html::textInput('tanggal_selesai',Yii::$app->request->get('tanggal_selesai'),['class' => 'form-control']),
             ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
 ?>

<a href="index.php?r=site%2Findex">Terima Kasih Sudah Melakukan Transaksi</a>
</div>
