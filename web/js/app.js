$(function() {
    $.get('/entry/index', function (data) {
        $('.dataAjax').html(data);
    });

    $('body').on('click', '.buttonAction', function () {
        if($(this).data('url')){
            $.get($(this).data('url'), function (data) {
                $('.dataAjax').html(data);
            });
        }
    });
});