<div class="content">
    <div class="form-group">
        @include('blocks.navigate')
    </div>
    {!! Form::model($tender, [
        'route' => 'tender.update',
        'enctype' => 'multipart/form-data',
        'method' => 'put',
    ]) !!}

    @include('blocks.form-edit', ['tender' => $tender])

    {!! Form::button('Save', [
        'class' => 'btn btn-info add-btn',
        'id' => 'saveTender',
        'data-id' => $tender->id,
    ]) !!}

    {!! Form::close() !!}
</div>