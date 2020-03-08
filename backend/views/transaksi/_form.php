<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Transaksi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transaksi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= 
         $form->field($model, 'id_karyawan')->widget(Select2::classname(), [
            'data' => $Karyawan,
            'options' => ['placeholder' => '-Pilih Karyawan-'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'id_pelanggan')->textInput(['maxlength' => true]) ?>

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
     
    <?= $form->field($model, 'estimasi')->dropDownList([ '1 Hari' => '1 Hari', '2 Hari' => '2 Hari', '3 Hari' => '3 Hari', ], ['prompt' => '-Pilih Hari-']) ?>

    <?= $form->field($model, 'total_berat')->textInput(['maxlength' => true,'type' => 'number']) ?>

    <?= $form->field($model, 'harga_per_kilo')->textInput(['maxlength' => true,'type' => 'number']) ?>

    <?= $form->field($model, 'total_harga')->textInput(['maxlength' => true,'readonly' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(['Belum Lunas' => 'Belum Lunas','Lunas' => 'Lunas'],['prompt' => '-Pilih Status-']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
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
JS
);

?>
</script>
