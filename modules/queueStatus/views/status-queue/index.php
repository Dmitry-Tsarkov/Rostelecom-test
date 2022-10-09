<?php
;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\DetailView;
use app\modules\queueStatus\models\StatusQueue;

/**
 * @var $this View
 * @var $statusQueue StatusQueue
 */

?>

<?= Html::a('Сгенерировать данные',
    ['/queue-status/status-queue/create'],
    [
        'data-pjax' => 0,
        'class' => 'btn btn-primary btn-xs',
        'data-method' => 'POST'
    ]);
?>

<?= Html::a('Очистить таблицу',
    ['/queue-status/status-queue/delete'],
    [
        'data-pjax' => 0,
        'class' => 'btn btn-danger btn-xs',
        'data-method' => 'POST'
    ]);
?>


<?php if (!empty($statusQueue)): ?>
<div>
    <?= DetailView::widget([
        'model' => $statusQueue,
        'options' => ['class' => 'table table-hover'],
        'attributes' => [
            'c_id',
            's_name',
            'c_name',
            'a_type',
            'direction',
            'activation',
            'c_state',
            'control'
        ],
    ]) ?>
</div>
<?php endif ?>