<?php
/**
 * Summary Text
 */
use kartik\grid\GridView;
use yii\helpers\Html;
use backend\models\UserType;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ActivityCategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<div class="user-index">
    <?php
    $isFa = true;
    $defaultExportConfig = [
        GridView::HTML => [
            'label' => 'HTML',
            'icon' => $isFa ? 'file-text' : 'floppy-saved',
            'iconOptions' => ['class' => 'text-info'],
            'showHeader' => true,
            'showPageSummary' => true,
            'showFooter' => true,
            'showCaption' => true,
            'filename' => 'grid-export',
            'alertMsg' => 'The HTML export file will be generated for download.',
            'options' => ['title' => 'kvgrid', 'Hyper Text Markup Language'],
            'mime' => 'text/html',
            'config' => [
                'cssFile' => 'http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css'
            ]
        ],
        GridView::CSV => [
            'label' => 'CSV',
            'icon' => $isFa ? 'file-code-o' : 'floppy-open',
            'iconOptions' => ['class' => 'text-primary'],
            'showHeader' => true,
            'showPageSummary' => true,
            'showFooter' => true,
            'showCaption' => true,
            'filename' => 'grid-export',
            'alertMsg' => 'The CSV export file will be generated for download.',
            'options' => ['title' => 'Comma Separated Values'],
            'mime' => 'application/csv',
            'config' => [
                'colDelimiter' => ",",
                'rowDelimiter' => "\r\n",
            ]
        ],
        GridView::TEXT => [
            'label' => 'Text',
            'icon' => $isFa ? 'file-text-o' : 'floppy-save',
            'iconOptions' => ['class' => 'text-muted'],
            'showHeader' => true,
            'showPageSummary' => true,
            'showFooter' => true,
            'showCaption' => true,
            'filename' => 'grid-export',
            'alertMsg' => 'The TEXT export file will be generated for download.',
            'options' => ['title' => 'Tab Delimited Text'],
            'mime' => 'text/plain',
            'config' => [
                'colDelimiter' => "\t",
                'rowDelimiter' => "\r\n",
            ]
        ],
        GridView::EXCEL => [
            'label' => 'Excel',
            'icon' => $isFa ? 'file-excel-o' : 'floppy-remove',
            'iconOptions' => ['class' => 'text-success'],
            'showHeader' => true,
            'showPageSummary' => true,
            'showFooter' => true,
            'showCaption' => true,
            'filename' => 'grid-export',
            'alertMsg' => 'The EXCEL export file will be generated for download.',
            'options' => ['title' => 'Microsoft Excel 95+'],
            'mime' => 'application/vnd.ms-excel',
            'config' => [
                'worksheet' => 'ExportWorksheet',
                'cssFile' => ''
            ]
        ],
        GridView::PDF => [
            'label' => 'PDF',
            'icon' => $isFa ? 'file-pdf-o' : 'floppy-disk',
            'iconOptions' => ['class' => 'text-danger'],
            'showHeader' => true,
            'showPageSummary' => true,
            'showFooter' => true,
            'showCaption' => true,
            'filename' => 'grid-export',
            'alertMsg' => 'The PDF export file will be generated for download.',
            'options' => ['title' => 'Portable Document Format'],
            'mime' => 'application/pdf',
            'config' => [
                'mode' => 'c',
                'format' => 'A4-L',
                'destination' => 'D',
                'marginTop' => 20,
                'marginBottom' => 20,
                'cssInline' => '.kv-wrap{padding:20px;}' .
                '.kv-align-center{text-align:center;}' .
                '.kv-align-left{text-align:left;}' .
                '.kv-align-right{text-align:right;}' .
                '.kv-align-top{vertical-align:top!important;}' .
                '.kv-align-bottom{vertical-align:bottom!important;}' .
                '.kv-align-middle{vertical-align:middle!important;}' .
                '.kv-page-summary{border-top:4px double #ddd;font-weight: bold;}' .
                '.kv-table-footer{border-top:4px double #ddd;font-weight: bold;}' .
                '.kv-table-caption{font-size:1.5em;padding:8px;border:1px solid #ddd;border-bottom:none;}',
                'methods' => [
                    'SetHeader' => [
                        ['odd' => 'pdfHeader', 'even' => 'pdfHeader']
                    ],
                    'SetFooter' => [
                        ['odd' => 'pdfFooter', 'even' => 'pdfFooter']
                    ],
                ],
                'options' => [
                    'title' => 'this is a title',
                    'subject' => 'PDF export generated by kartik-v/yii2-grid extension',
                    'keywords' => 'krajee, grid, export, yii2-grid, pdf'
                ],
                'contentBefore' => '',
                'contentAfter' => ''
            ]
        ],
        GridView::JSON => [
            'label' => 'JSON',
            'icon' => $isFa ? 'file-code-o' : 'floppy-open',
            'iconOptions' => ['class' => 'text-warning'],
            'showHeader' => true,
            'showPageSummary' => true,
            'showFooter' => true,
            'showCaption' => true,
            'filename' => 'grid-export',
            'alertMsg' => 'The JSON export file will be generated for download.',
            'options' => ['title' => 'JavaScript Object Notation'],
            'mime' => 'application/json',
            'config' => [
                'colHeads' => [],
                'slugColHeads' => false,
                'jsonReplacer' => null,
                'indentSpace' => 4
            ]
        ],
    ];

    $gridColumns = [
        ['class' => 'kartik\grid\SerialColumn'],
        [
            'attribute' => 'thumbnail',
            'format' => 'raw',
            'value' => function($data) {
                return Html::img(Yii::getAlias('@web') . '/../uploads/cycles/' . $data['thumbnail'], ['width' => '70px']);
            },
                    'filter' => false
                ],
                'name',
                 'short_description',    
                [
                    'class' => 'yii\grid\ActionColumn',
                    'contentOptions' => ['style' => 'width:300px;'],
                    'header' => 'Actions',
                    'template' => '{view}{update}{delete}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-eye-open pull-left" style="padding-right:5px;"></span>View', $url, [
                                        'title' => 'View',
                                        'class' => 'btn btn-circle white btn-sm',
                                        'data-pjax' => 0
                            ]);
                        },
                                'update' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-pencil pull-left" style="padding-right:5px;"></span>Update', $url, [
                                        'title' => 'update',
                                        'class' => 'btn btn-circle white btn-sm',
                                        'data-pjax' => 0
                            ]);
                        },
                                'delete' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-trash pull-left" style="padding-right:5px;"></span>Delete', $url, [
                                        'title' => 'delete',
                                        'class' => 'btn btn-circle white btn-sm',
                                        'data-pjax' => 0
                            ]);
                        },
                            ],
                            'urlCreator' => function ($action, $model, $key, $index) {
                        if ($action === 'view') {
                            $url = Url::to(['cycles/view', 'id' => $model->id]);
                            return $url;
                        } else if ($action === 'update') {
                            $url = Url::to(['cycles/update', 'id' => $model->id]);
                            return $url;
                        } else if ($action === 'delete') {
                            $url = Url::to(['cycles/delete', 'id' => $model->id]);
                            return $url;
                        }
                    }
                        ],
                    ];
                    ?>

                    <?php
                    Pjax::begin(['timeout' => 10000, 'clientOptions' => ['container' => 'pjax-container'], 'enablePushState' => false]);
                    echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => $gridColumns,
                        'id' => 'activites',
                        'pager' => [
                            'class' => '\yii\widgets\LinkPager',
                            'maxButtonCount' => 1,
                        ],
//                'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
//                'headerRowOptions' => ['class' => 'kartik-sheet-style'],
//                'filterRowOptions' => ['class' => 'kartik-sheet-style'],
                        'pjax' => true, // pjax is set to always true for this demo
                        'pjaxSettings' => [
                            'options' => [
                                'enablePushState' => false,
                            ],
                        ],
                        // 'beforeHeader'=>[
                        //     [
                        //         'columns'=>[
                        //             ['content'=>'Header Before 1', 'options'=>['colspan'=>5, 'class'=>'text-center warning']], 
                        //             ['content'=>'Header Before 2', 'options'=>['colspan'=>3, 'class'=>'text-center warning']], 
                        //             ['content'=>'Header Before 3', 'options'=>['colspan'=>3, 'class'=>'text-center warning']], 
                        //         ],
                        //         'options'=>['class'=>'skip-export'] // remove this row from export
                        //     ]
                        // ],
                        // set your toolbar
                        'toolbar' => [
//            '  <a id href="' . Url::to(['/category/create']) . '" class="btn green-meadow btn-circle">
//                <i class="fa fa-plus"></i>
//                <span class="hidden-480">
//                    Create </span>
//            </a> ',
                            Html::dropDownList('pagesize', $pageSize, array(5 => 5, 10 => 10, 20 => 20, 50 => 50, 100 => 100), array('id' => 'pagesize', 'class' => 'bs-select', 'onchange' => 'return pageSize(this,0)', 'style' => $pageSize > $dataProvider->getCount() || $pageSize != $dataProvider->getCount() ? '' : '')),
                            ['content' =>
                                Html::a('<i class="glyphicon glyphicon-plus"></i>', ['cycles/create'], ['title' => 'Cycles', 'data-pjax' => '0', 'style' => 'padding:11px 14px 8px 14px !important;color:#fff !important', 'class' => 'btn btn-success']) . ' ' .
                                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['data-pjax' => 1, 'class' => 'btn btn-default', 'style' => 'padding:10px 14px 8px 14px !important', 'title' => 'Reset Grid'])
                            ],
                            '{export}',
                        ],
                        // set export properties
                        'export' => [
                            'fontAwesome' => true
                        ],
                        // parameters from the demo form
                        // 'bordered'=>$bordered,
                        // 'striped'=>$striped,
                        // 'condensed'=>$condensed,
                        // 'responsive'=>$responsive,
                        // 'hover'=>$hover,
                        //'showPageSummary'=>true,
                        'panel' => [
                            'type' => GridView::TYPE_PRIMARY,
                            'heading' => '<i style="margin-right:5px;" class="glyphicon glyphicon-tag pull-left"></i> Cycles
    ',
                            'footer' => false,
                            'before' => '{pager}',
                        ],
                        'persistResize' => false,
                        'exportConfig' => $defaultExportConfig,
                    ]);
                    Pjax::end();
                    ?>
                </div>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $("#activites-pjax").on('pjax:complete', function () {
                            $('.bs-select').selectpicker({
                                iconBase: 'fa',
                                tickIcon: 'fa-check'
                            });
                        });
                    });
                    function pageSize(status) {
                        window.location.href = '<?php echo Url::to(['/cycles/index']) ?>&per-page=' + status.value;
    }

</script>