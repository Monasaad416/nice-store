<x-front-layout>
@push('css')

@endpush
    <x-slot:header>
        <!-- Page Header Start -->
        <div class="container-fluid bg-secondary mb-5">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
                <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
                <div class="d-inline-flex">
                    <p class="m-0"><a href="">Home</a></p>
                    <p class="m-0 px-2">-</p>
                    <p class="m-0">Shopping Cart</p>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
    </x-slot:header>

    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                    @if($cart->get())
                        @foreach($cart->get() as $item)
                            <tr>
                                <td class="align-middle"><img src="{{ asset('uploads/' . $item->product->image) }}" alt="" style="width: 50px;"></td>
                                <td class="align-middle">{{ $item->product->name }}</td>
                                @if($item->product->discount_price > 0)
                                    <td class="align-middle">{{CURRENCYSYMBOL::format($item->product->discount_price)}}</td>
                                @else
                                    <td class="align-middle">{{CURRENCYSYMBOL::format($item->product->price)}}</td>
                                @endif
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-primary btn-minus" data-decrease={{$item->id}}>
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" name="qty" class="qty form-control form-control-sm bg-secondary text-center" value="{{ $item->qty }}">
                                            <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-primary btn-plus" data-increase={{$item->id}}>
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                    </div>
                                </td>
                                <td class="align-middle" data-total={{CURRENCYSYMBOL::format($item->product->price * $item->qty ) }}>
                                    {{CURRENCYSYMBOL::format($item->product->price * $item->qty )}}
                                </td>
                                <td class="align-middle"><button class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                        @php
                            $subtotalWithoutFormat = $cart->total();
                            $totalWithoutFormat = $subtotalWithoutFormat +10;

                        @endphp
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">{{ CURRENCYSYMBOL::format($cart->total()) }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">{{ CURRENCYSYMBOL::format($totalWithoutFormat) }}</h5>
                        </div>
                        <a href="{{route('front.checkout.create')}}" style="text-decoration:none;">
                            <button class="btn btn-block btn-primary my-3 py-3">
                                Proceed To Checkout
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->



    @push('scripts')
    <script>

        $(function(){
            $('.quantity button').click(function(e){
                e.preventDefault();
                var item_id  = $(this).data('increase');
                console.log(item_id);
                if(item_id){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ URL::to("/front/cart/increase") }}/"  + item_id,
                        type: "post",
                        data:{qty : $(this).val()},
                        success: function (data) {
                            console.log(data);

                        },
                    });
                } else {
                    console.log("Ajax Error - Increase");
                }
            });


            $('.quantity button').click(function(e){
                e.preventDefault();
                var item_id  = $(this).data('decrease');
                console.log(item_id);
                if(item_id){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ URL::to("/front/cart/decrease") }}/"  + item_id,
                        type: "post",
                        data:{
                                qty : $(this).val(),
                            },
                        success: function (data) {
                            console.log(data);

                        },
                    });
                } else {
                    console.log("Ajax Error -Decrease");
                }
            });
        })
    </script>
    @endpush

</x-front-layout>
