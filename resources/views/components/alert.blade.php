@if(session()->has('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

@if(session()->has('update'))
    <div class="alert alert-info">
        {{session('update')}}
    </div>
@endif


@if(session()->has('delete'))
    <div class="alert alert-danger">
        {{session('delete')}}
    </div>
@endif