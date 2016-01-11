
<div class="content">
    <div class="form-group">
        @include('blocks.navigate')
    </div>
        <table class="table">
            <tr>
                <td><strong>Tender name</strong></td>
                <td><strong>Author</strong></td>
                <td><strong>Active days</strong></td>
                <td><strong>Status</strong></td>
                <td><strong>Manage</strong></td>
            </tr>
            @foreach($tender as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->author_name}}</td>
                    <td>{{$item->days_count}}</td>
                    <td>{{$item->status}}</td>
                    <td>
                        {!!Form::button('view',[
                            'class' => 'btn btn-primary view',
                            'data-id' => $item->id,
                        ])!!}
                        {!!Form::button('edit',[
                            'class' => 'btn btn-primary edit',
                            'data-id' => $item->id,
                        ])!!}
                        {!!Form::button('delete',[
                            'class' => 'btn btn-primary delete',
                            'data-id' => $item->id,
                        ])!!}
                    </td>
                </tr>
            @endforeach
        </table>
</div>