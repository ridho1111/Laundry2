 <?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Karyawan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="karyawan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_kelamin')->dropDownList([ 'L' => 'L', 'P' => 'P', ], ['prompt' => '-Pilih Jenis-']) ?>

    <?= $form->field($model, 'no_telp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'agama')->dropDownList([ 'Islam' => 'Islam', 'Protestan' => 'Protestan', 'Katolik' => 'Katolik', 'Budha' => 'Budha', 'Konghucu' => 'Konghucu', 'Hindu' => 'Hindu', ], ['prompt' => '-Pilih Agama-']) ?>

    <?= $form->field($model, 'tempat_tanggal_lahir')->textInput(['maxlength' => true]) ?>

     <?= 
            $form->field($model, 'tanggal_gabung')->widget(DatePicker::classname(), [
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

    <?= $form->field($model, 'usia')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(['Menikah' => 'Menikah', 'Single' => 'single'], ['prompt' => '']) ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
