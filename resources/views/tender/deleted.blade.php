
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
                    {!!Form::button('restore',[
                        'class' => 'btn btn-primary restore',
                        'data-id' => $item->id,
                    ])!!}
                </td>
            </tr>
        @endforeach
    </table>
</div>