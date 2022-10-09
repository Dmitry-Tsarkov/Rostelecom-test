<?php

use app\modules\status\searchModels\StatusSearch;
use kartik\grid\ActionColumn;
use kartik\grid\DataColumn;
use yii\data\DataProviderInterface;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var $this View
 * @var DataProviderInterface $dataProvider
 * @var StatusSearch $searchModel
 */

?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'summaryOptions' => ['class' => 'text-right'],
    'toolbar' => [
        [
            'content' =>
                Html::a('Добавить', ['create'], ['class' => 'btn btn-success', 'data-pjax' => '0'])
        ],
        '{toggleData}',
    ],
    'pjax' => true,
    'pjaxSettings' => [
        'options' => [
            'id' => 'pjax-widget'
        ],
    ],
    'striped' => false,
    'hover' => true,
    'panel' => [
        'after' => false,
    ],
    'export' => false,
    'toggleDataOptions' => [
        'all' => [
            'icon' => 'resize-full',
            'label' => 'Показать все',
            'class' => 'btn btn-default',
            'title' => 'Показать все'
        ],
        'page' => [
            'icon' => 'resize-small',
            'label' => 'Страницы',
            'class' => 'btn btn-default',
            'title' => 'Постаничная разбивка'
        ],
    ],
    'columns' => [
        [
            'class' => DataColumn::class,
            'vAlign' => GridView::ALIGN_MIDDLE,
            'hAlign' => GridView::ALIGN_CENTER,
            'attribute' => 'c_id',
            'format' => 'raw',
            'width' => '70px',
        ],
        [
            'class' => DataColumn::class,
            'vAlign' => GridView::ALIGN_MIDDLE,
            'hAlign' => GridView::ALIGN_CENTER,
            'attribute' => 's_name',
            'format' => 'raw',
            'width' => '70px',
        ],
        [
            'class' => DataColumn::class,
            'vAlign' => GridView::ALIGN_MIDDLE,
            'hAlign' => GridView::ALIGN_CENTER,
            'attribute' => 'c_name',
            'format' => 'raw',
            'width' => '70px',
        ],
        [
            'class' => DataColumn::class,
            'vAlign' => GridView::ALIGN_MIDDLE,
            'hAlign' => GridView::ALIGN_CENTER,
            'attribute' => 'a_type',
            'format' => 'raw',
            'width' => '70px',
        ],
        [
            'class' => DataColumn::class,
            'vAlign' => GridView::ALIGN_MIDDLE,
            'hAlign' => GridView::ALIGN_CENTER,
            'attribute' => 'direction',
            'format' => 'raw',
            'width' => '70px',
        ],
        [
            'class' => DataColumn::class,
            'vAlign' => GridView::ALIGN_MIDDLE,
            'hAlign' => GridView::ALIGN_CENTER,
            'attribute' => 'activation',
            'format' => 'raw',
            'width' => '70px',
        ],[
            'class' => DataColumn::class,
            'vAlign' => GridView::ALIGN_MIDDLE,
            'hAlign' => GridView::ALIGN_CENTER,
            'attribute' => 'c_state',
            'format' => 'raw',
            'width' => '70px',
        ],
        [
            'class' => DataColumn::class,
            'vAlign' => GridView::ALIGN_MIDDLE,
            'hAlign' => GridView::ALIGN_CENTER,
            'attribute' => 'control',
            'format' => 'raw',
            'width' => '70px',
        ],
        [
            'class' => ActionColumn::class,
            'template' => '{delete}',
            'width' => '170px',
            'buttons' => [
                'delete' => function ($url, $model, $key) {
                    return Html::a('Удалить', [
                        'delete',
                        'id' => $model->id,
                    ],
                        ['class' => 'btn btn-danger btn-xs', 'data-pjax' => '0', 'data-method' => 'post']);
                },
            ],
        ],
    ]
])
?>
