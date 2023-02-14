<x-front-layout>
@push('css')
        
@endpush
    <x-slot:header>
        <!-- Page Header Start -->
        <div class="container-fluid bg-secondary mb-5">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
                <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
                <div class="d-inline-flex">
                    <p class="m-0"><a href="">Home</a></p>
                    <p class="m-0 px-2">-</p>
                    <p class="m-0">Checkout</p>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
    </x-slot:header>

    
    <!-- Checkout Start -->
    @include('inc.errors')
    <form method="post" action="{{route('front.checkout.store')}}">
        @csrf
        <div class="container-fluid pt-5">
            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <div class="mb-4">
                        <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>First Name</label>
                                <input class="form-control" type="text" name="address[billing][first_name]" placeholder="John">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Last Name</label>
                                <input class="form-control" type="text" name="address[billing][last_name]" placeholder="Doe">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="text" name="address[billing][email]" placeholder="example@email.com">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mobile No</label>
                                <input class="form-control" type="text" name="address[billing][phone]" placeholder="+123 456 789">
                            </div>
              
  
                            <div class="col-md-6 form-group">
                                <label>ZIP Code</label>
                                <input class="form-control" type="text" name="address[billing][zip_code]" placeholder="123">
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Street</label>
                                <input class="form-control" type="text" name="address[billing][street]" placeholder="123">
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Governorate</label>
                                <select class="custom-select" name="address[billing][governorate_id]">
                                    <option selected>Select Governorate...</option>
                                    @foreach(App\Models\Governorate::all() as $gov)
                                        <option value="{{$gov->id}}">{{$gov->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>City</label>
                                <select class="custom-select" name="address[billing][city_id]">
                                    <option selected>Select City...</option>
        
                                </select>
                            </div>
    
                            <div class="col-md-12 form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="newaccount">
                                    <label class="custom-control-label" for="newaccount">Create an account</label>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="shipping" class="custom-control-input" id="shipto">
                                    <label class="custom-control-label" for="shipto"  data-toggle="collapse" data-target="#shipping-address">Ship to different address</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="collapse mb-4" id="shipping-address">
                        <h4 class="font-weight-semi-bold mb-4">Shipping Address</h4>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>First Name</label>
                                    <input class="form-control" type="text" name="address[shipping][first_name]" placeholder="John">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text" name="address[shipping][last_name]" placeholder="Doe">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>E-mail</label>
                                    <input class="form-control" type="text" name="address[shipping][email]" placeholder="example@email.com">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Mobile No</label>
                                    <input class="form-control" type="text" name="address[shipping][phone]" placeholder="+123 456 789">
                                </div>
                
    
                                <div class="col-md-6 form-group">
                                    <label>ZIP Code</label>
                                    <input class="form-control" type="text" name="address[shipping][zip_code]" placeholder="123">
                                </div>

                                <div class="col-md-6 form-group">
                                    <label>Street</label>
                                    <input class="form-control" type="text" name="address[shipping][street]" placeholder="123">
                                </div>

                                <div class="col-md-6 form-group">
                                    <label>Governorate</label>
                                    <select class="custom-select" name="address[shipping][governorate_id]">
                                        <option selected>Select Governorate...</option>
                                        @foreach(App\Models\Governorate::all() as $gov)
                                            <option value="{{$gov->id}}">{{$gov->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>City</label>
                                    <select class="custom-select" name="address[shipping][city_id]">
                                        <option selected>Select City...</option>
            
                                    </select>
                                </div>
        
                                <div class="col-md-12 form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="newaccount">
                                        <label class="custom-control-label" for="newaccount">Create an account</label>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="shipping" class="custom-control-input" id="shipto">
                                        <label class="custom-control-label" for="shipto"  data-toggle="collapse" data-target="#shipping-address">Ship to different address</label>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                        </div>
                        <div class="card-body">
                            <h5 class="font-weight-medium mb-3">Products</h5>
                            <div class="d-flex justify-content-between">
                                <p>Colorful Stylish Shirt 1</p>
                                <p>$150</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p>Colorful Stylish Shirt 2</p>
                                <p>$150</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p>Colorful Stylish Shirt 3</p>
                                <p>$150</p>
                            </div>
                            <hr class="mt-0">
                            <div class="d-flex justify-content-between mb-3 pt-1">
                                <h6 class="font-weight-medium">Subtotal</h6>
                                <h6 class="font-weight-medium">$150</h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Shipping</h6>
                                <h6 class="font-weight-medium">$10</h6>
                            </div>
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <div class="d-flex justify-content-between mt-2">
                                <h5 class="font-weight-bold">Total</h5>
                                <h5 class="font-weight-bold">$160</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Payment</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                    <label class="custom-control-label" for="paypal">Paypal</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                    <label class="custom-control-label" for="directcheck">Direct Check</label>
                                </div>
                            </div>
                            <div class="">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                    <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <button type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Checkout End -->


    @push('scripts')
        <script>
            $(document).ready(function () {
                $('select[name="address[billing][governorate_id]"]').on('change', function () {
                    var governorate_id = $(this).val();
                    console.log(governorate_id);
                    if (governorate_id) {

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: "{{ URL::to('/front/cities') }}/" + governorate_id,
                            type: "get",
                            dataType: "json",
                            success: function (data) {
                                $('select[name="address[billing][city_id]"]').empty();
                                $.each(data, function (key, value) {
                                    $('select[name="address[billing][city_id]"]').append('<option value="' + key + '">' + value + '</option>');
                                });
                            },
                        });
                    } else {
                        console.log('AJAX load did not work');
                    }
                });


                   $('select[name="address[shipping][governorate_id]"]').on('change', function () {
                    var governorate_id = $(this).val();
                    console.log(governorate_id);
                    if (governorate_id) {

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: "{{ URL::to('/front/cities') }}/" + governorate_id,
                            type: "get",
                            dataType: "json",
                            success: function (data) {
                                $('select[name="address[shipping][city_id]"]').empty();
                                $.each(data, function (key, value) {
                                    $('select[name="address[shipping][city_id]"]').append('<option value="' + key + '">' + value + '</option>');
                                });
                            },
                        });
                    } else {
                        console.log('AJAX load did not work');
                    }
                });
            });
        </script>
    @endpush

</x-front-layout>