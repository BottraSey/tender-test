
$(document).ready(function () {
    ajaxLink('/tender');
});

$('body').on('click', '#createNew', function () {
    ajaxLink('/tender/create');
});

$('body').on('click', '#viewDeleted', function () {
    ajaxLink('/tender/deleted');
});

$('body').on('click', '#home', function () {
    ajaxLink('/tender');
});

$('body').on('click', '.restore', function () {
    ajaxLink('/tender/restore/' + $(this).attr('data-id'));
});

$('body').on('click', '.delete', function () {
    ajaxLink('/tender/delete/' + $(this).attr('data-id'));
});


$('body').on('click', '#addTender', function () {
    $('#description').text(CKEDITOR.instances.description.getData());

    $.ajax({
        url: '/tender',
        type: 'post',
        dataType: 'json',
        data: new FormData( $("form")[0] ),
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function(){
            $('.wrapper').addClass('load');
            $('.errors').remove();
        },
        success: function(data){
            $('.wrapper').removeClass('load');
            ajaxLink('/tender');
        },
        error: function(data){
            $('.wrapper').removeClass('load');
            var errors = data.responseJSON;

            $.each(errors, function(index, value) {
                $('#' + index).after('<div class="errors">' + value + '</div>');
            });
        }
    });
});


function ajaxLink(link, type){
    var request_type = type || 'get';
    $.ajax({
        url: link,
        type: request_type,
        dataType: 'html',
        beforeSend: function(){
            $('.wrapper').addClass('load');
        },
        success: function(data){
            $('.wrapper').removeClass('load');
            $('#infoBlock').html(data);
        }
    });
}