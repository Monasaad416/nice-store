@extends('web.layouts.layout')


@section('page_header')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">{{$cat->name}}</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{route('web.index')}}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">{{$cat->name}} Categories</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
@endsection
@section('content')
    <!-- Sub Categories Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            @foreach($subCatsCategory as $subCat)
                 <div class="col-lg-4 col-md-6 pb-1" >
                    <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;height:350px;">
                        <p class="text-right">{{$subCat->products->count()}} Products</p>
                             <a href="{{route('web.subCategoryProducts',['sub_cat_slug' => $subCat->slug ])}}" class="cat-img position-relative overflow-hidden mb-3">
                                <img class="img-fluid" src="{{url("uploads/$subCat->image")}}" alt="">
                            </a>
                        <h5 class="font-weight-semi-bold m-0">{{$subCat->name}}</h5>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Sub Categories End -->
@endsection




