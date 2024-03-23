@extends('layout.main')

@section('title', 'Cart Item')

@section('container')

<section class="ftco-section ftco-cart">
    <div class="container">
        <h1 class="mb-3 mt-5 bread text-center">Cart</h1>
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list" style="overflow: hidden !important;">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $totalPriceAll = 0;
                            @endphp

                            @foreach ($cart as $data)
                            <tr class="text-center" id="removeCart-{{ $data->id }}">
                                <td class="product-remove">
                                    <button class="btn btn-primary p-2" onclick="removeCart({{ $data->id }})">
                                        <span class="icon-close"></span>
                                    </button>
                                </td>
                                <td class="image-prod">
                                    <div class="img" style="background-image:url({{ asset('gambar/'.$data->product->image ) }});"></div>
                                </td>
                                <td class="product-name">
                                    <h3>{{ $data->product->name }}</h3>
                                </td>
                                <td class="price">{{ number_format($data->product->price, 0, ',', '.') }}</td>
                                <td class="quantity">
                                    <div class="input-group mb-3">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-primary" onclick="reduceQuantity({{ $data->id }})">
                                                <span class="icon-minus p-2"></span>
                                            </button>
                                        </span>
                                        <input type="text" name="quantity-{{ $data->id }}" class="quantity form-control input-number" value="{{ $data->quantity }}" min="1" readonly>
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-primary" onclick="addQuantity({{ $data->id }})">
                                                <span class="icon-plus p-2"></span>
                                            </button>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            @php
                            $totalPriceAll += $data->product->price * $data->quantity;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Cart Totals</h3>
                    <p class="d-flex total-price">
                        Rp. <span id="cartTotals" class="ml-2" style="font-size: 24px;"> {{ number_format($totalPriceAll, 0, ',', '.') }}</span>
                    </p>
                </div>
                <p class="text-center"><a href="{{ route('checkout') }}" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
            </div>
        </div>
    </div>
</section>


@endsection
@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function reduceQuantity(itemId) {
        var input = document.querySelector('input[name="quantity-' + itemId + '"]');
        var currentValue = parseInt(input.value);
        if (currentValue > 1) {
            input.value = currentValue - 1;
            updateQuantity(itemId, currentValue - 1);
        }
    }

    function addQuantity(itemId) {
        var input = document.querySelector('input[name="quantity-' + itemId + '"]');
        var currentValue = parseInt(input.value);
        input.value = currentValue + 1;
        updateQuantity(itemId, currentValue + 1);
    }

    function updateQuantity(cartId, quantity) {
        $.ajax({
            url: "{{ route('cart.update') }}",
            method: "POST",
            data: {
                cartId: cartId,
                quantity: quantity,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                updateCartCount();
                updateCartTotal();
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    function removeCart(cartId) {
        $.ajax({
            url: "{{ route('cart.remove') }}",
            method: "POST",
            data: {
                cartId: cartId,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                //remove table row cart
                $('#removeCart-' + cartId).remove();

                updateCartCount();
                updateCartTotal();
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    function updateCartTotal() {
        $.ajax({
            url: "{{ route('cart.total') }}",
            method: "GET",
            success: function(response) {
                var formattedCartTotals = response.total.toLocaleString('id-ID', {
                    style: 'decimal',
                });
                $('#cartTotals').text(formattedCartTotals);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    function updateCartCount() {
        $.ajax({
            url: "{{ route('cart.count') }}",
            method: "GET",
            success: function(response) {
                $('#cart-count').text(response.count);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    $(document).ready(function() {
        updateCartCount();
    });
</script>
@endsection