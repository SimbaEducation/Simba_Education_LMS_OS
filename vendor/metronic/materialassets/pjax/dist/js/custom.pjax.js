 $(document).ready(function() 
    {
        $(document).on('pjax:beforeSend', function (xhr, options) {
            Metronic.blockUI({
                 target: '.yii-pjax-grid',
                 animate: true
            });
        });
        $(document).on('pjax:complete', function (xhr, options) {
            Metronic.unblockUI('.yii-pjax-grid');
            $('.date-picker').datepicker({
                format: 'yyyy-mm-dd',
            });
        });
    });