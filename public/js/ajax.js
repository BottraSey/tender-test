
$(document).ready(function () {
    $.ajax({
        url: '/tender',
        type: 'get',
        dataType: 'html',
        beforeSend: function(){
            $('#infoBlock').addClass('load');
        },
        success: function(data){
            $('#infoBlock').removeClass('load');
            $('#infoBlock').html(data);
        }
    });
});

$('body').on('click', '#createNew', function () {
    $.ajax({
        url: '/tender/create',
        type: 'get',
        dataType: 'html',
        beforeSend: function(){
            $('#infoBlock').addClass('load');
        },
        success: function(data){
            $('#infoBlock').removeClass('load');
            $('#infoBlock').html(data);
        }
    });
});