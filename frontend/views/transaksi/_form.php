
<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;        
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model frontend\models\Transaksi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transaksi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_karyawan')->textInput(['maxlength' => true]) ?>

    <?= 
        $form->field($model, 'id_pelanggan')->widget(Select2::classname(), [
        'data' => $Pelanggan,
        'options' => ['placeholder' => '-Pilih Pelanggan-'],
        'pluginOptions' => [
        'allowClear' => true
    ],
]);
    ?>

    <?= 
            $form->field($model, 'tanggal_masuk')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Pilih Tanggal'],
            'pluginOptions' => [
            'todayHighLight' => true,
            'todayBtn' => true,
            'showAnim' => true,
            'format' => 'yyyy-mm-dd',
            'autoclose'=>true,
             ]
            ]);
     ?>

    <?= $form->field($model, 'estimasi')->textInput([ 'maxlength' => true,'type' => 'number']) ?>

    <?= $form->field($model, 'total_berat')->textInput(['maxlength' => true,'type' => 'number']) ?>

    <?= $form->field($model, 'harga_per_kilo')->textInput(['maxlength' => true,'type' => 'number']) ?>

    <?= $form->field($model, 'total_harga')->textInput(['maxlength' => true,'readonly' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Belum Lunas' => 'Belum Lunas', 'Lunas' => 'Lunas', ], ['prompt' => '-Belum Lunas-']) ?>

    <?= $form->field($model, 'tanggal_selesai')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php 

$this->registerJs(<<<JS

    $('#transaksi-total_berat').keyup(function(){
       calculateTotalHarga()
    });

    $('#transaksi-harga_per_kilo').keyup(function(){
        calculateTotalHarga()
    });

    function calculateTotalHarga() {
        const berat = $('#transaksi-total_berat').val();
        const hargaSatuan = $('#transaksi-harga_per_kilo').val();
        const totalHarga = berat * hargaSatuan;

        return $("#transaksi-total_harga").val(totalHarga);
    }

    $('#transaksi-tanggal_selsai').ready(function () {
    $('#tanggal_masuk').datepicker();
    $('#estimasi').keyup();
});

function getdate() {
    var tt = '#transaksi-tanggal_selsai'.getElementById('tanggal_masuk').value;

    var date = new Date(tt);
    var newdate = new Date(date);

    newdate.setDate(newdate.getDate() + 3);
    
    var dd = newdate.getDate();
    var mm = newdate.getMonth() + 1;
    var y = newdate.getFullYear();

    var someFormattedDate = mm + '/' + dd + '/' + y;
    '#transaksi-tanggal_selsai'.getElementById('estimasi').value = someFormattedDate;
}

JS
);

?>