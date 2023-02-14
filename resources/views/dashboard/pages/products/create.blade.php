@extends('dashboard.layout.layout')

@section('content')
    <div class="card">

        @inject('model', 'App\Models\Category')

        @include('inc.errors')
            @php
                $categories = App\Models\Category::pluck('name', 'id');
                $stores = App\Models\Store::pluck('name', 'id');
            @endphp

        {!! Form::model($model,[
                'route' => 'admin.dashboard.products.store',
                'files' =>true,
            ])
        !!}


            <div class="card-body">
                <div class="form-group">
                    {!!Form::label('name', 'Name:')!!}
                    {!!Form::text('name', null,[
                        'class' => ($errors->has('name')) ? 'form-control is-invalid' : 'form-control' ,
                        'placeholder' => 'Enter Product name...'
                    ])!!}
                </div>

                <div class="form-group">
                    {!!Form::label('description', 'Description:')!!}
                    {!!Form::text('description', null,[
                        'class' => ($errors->has('description')) ? 'form-control is-invalid' : 'form-control' ,
                        'placeholder' => 'Enter Product description...'
                    ])!!}
                </div>


                <div class="form-group">
                    {!!Form::label('category', 'Category:')!!}
                    {!! Form::select('category_id', $categories, null ,
                    ['class' => 'form-control my-3',
                    'placeholder' => 'Select Category...',
                    ])
                    !!}
                </div>

                <div class="form-group">
                    {!!Form::label('store', 'Store:')!!}
                    {!! Form::select('store_id', $stores, null ,
                    ['class' => 'form-control my-3',
                    'placeholder' => 'Select store...',
                    ])
                    !!}
                </div>

          
                <div class="form-group">
                    {!!Form::label('price', 'Price:')!!}
                    {!!Form::text('price', null,[
                        'class' => ($errors->has('price')) ? 'form-control is-invalid' : 'form-control' ,
                        'placeholder' => 'Enter product price ...'
                    ])!!}
                </div>

                <div class="form-group">
                    {!!Form::label('tags', 'Tags:')!!}
                    {!!Form::text('tags', null,[
                        'class' => ($errors->has('tags')) ? 'form-control is-invalid' : 'form-control' ,
                        'placeholder' => 'Enter Tags name separated by ,'
                    ])!!}
                </div>

                <div class="form-group">
                    {!!Form::label('Status', 'Status:')!!}
                    <br>
                    {!!Form::label('active', 'Active:')!!}
                    {!!Form::radio('status', '1') !!}
                    <br>
                    {!!Form::label('inactive', 'Inactive:')!!}
                    {!!Form::radio('status', '0') !!}
                    <br>
                    {!!Form::label('archived', 'Archived:')!!}
                    {!!Form::radio('status', '3') !!}
                </div>

                <div class="form-group">
                    {!!Form::label('name', 'Image:')!!}
                    {!!Form::file('image')!!}
                </div>

    

                <div class="form-group">
                    {!!Form::submit('Save',[
                        'class' =>'btn btn-primary btn-flat'
                    ])!!}
                </div>
            </div>



        {!! Form::close() !!}

    </div>
@endsection



@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
@endpush
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <script>
        var inputElm = document.querySelector('[name=tags]');
        console.log("jjjjjjjjjj");
        tagify = new Tagify (inputElm);

        inputElm.addEventListener('change', onChange)

        function onChange(e){
        // outputs a String
        console.log(e.target.value)
        }
    </script>
@endpush