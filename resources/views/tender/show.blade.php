<div class="content">
    <div class="form-group">
        @include('blocks.navigate')
    </div>
    <div class="form-group">
        <strong>Name: {{$tender->name}}</strong>
    </div>
    <div class="form-group">
        <strong>Description:</strong>
        {!!$tender->description!!}
    </div>
    <div class="form-group">
        <strong>Name: {{$tender->name}}</strong>
    </div>
    <div class="form-group">
        <strong>Photo:</strong>
        <img src="/uploads/{{$tender->photo}}" class="img-responsive" alt="">
    </div>
    <div class="form-group">
        <strong>Phone: {{$tender->phone}}</strong>
    </div>
    <div class="form-group">
        <strong>Active days: {{$tender->active_date}}</strong>
    </div>
    <div class="form-group">
        <strong>Status: {{$tender->status}}</strong>
    </div>
</div>