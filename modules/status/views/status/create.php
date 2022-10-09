<?php

use yii\helpers\Html;
use yii\web\View;
use kartik\form\ActiveForm;
use app\modules\status\forms\StatusForm;

/**
 * @var $this View
 * @var $statusForm StatusForm
 */

?>

<div class="box box-default box-solid">
    <div class="box-body">
        <?php $form = ActiveForm::begin() ?>
        <div class="row">
            <div class="col-xs-8">
                <?= $form->field($statusForm, 'c_id')->textarea(['rows' => 2]); ?>
                <?= $form->field($statusForm, 's_name')->textarea(['rows' => 2]); ?>
                <?= $form->field($statusForm, 'c_name')->textarea(['rows' => 2]); ?>
                <?= $form->field($statusForm, 'a_type')->dropDownList([
                        $statusForm->getTypesDropDown()
                ]); ?>
                <?= $form->field($statusForm, 'direction')->textarea(['rows' => 2]); ?>
                <?= $form->field($statusForm, 'activation')->textarea(['rows' => 2]); ?>
                <?= $form->field($statusForm, 'c_state')->textarea(['rows' => 2]); ?>
                <?= $form->field($statusForm, 'control')->textarea(['rows' => 2]); ?>
            </div>
        </div>
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
        <?php ActiveForm::end() ?>
    </div>
</div>
