@extends('dashboard.layout.layout')
@section('content')

<div class="container-fluid">

                    <!-- Page Heading -->
                    <h2 class="h3 mb-2 text-gray-800">Produts</h2>
                    <p class="mb-4">{{auth('store')->check() ? auth('store')->user()->name ." ".'products' : 'All Products' }}</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            @auth('admin')
                                               <th>Store</th> 
                                            @endauth
                                            
                                            <th>Price</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            @auth('admin')
                                                <th>Store</th>
                                            @endauth    
                                            <th>Price</th>
                                            <th>Image</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product->Category->name}}</td>
                                                @auth('admin')
                                                    <td>{{$product->store->name}}</td>
                                                @endauth    
                                                <td>{{$product->Price}}</td>
                                                <td>{{$product->image}}</td>
                                            </tr>     
                                        @endforeach
                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
{{$products->links()}}
                </div>

@endsection
