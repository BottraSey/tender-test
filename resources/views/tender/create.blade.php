{!! Form::model($tender, [
    'route' => 'tender.store',
    'enctype' => 'multipart/form-data'
]) !!}

@include('blocks.form', ['tender' => $tender])

{!! Form::button('Add', [
    'class' => 'btn btn-info add-btn',
    'id' => 'addTender',
]) !!}

{!! Form::close() !!}