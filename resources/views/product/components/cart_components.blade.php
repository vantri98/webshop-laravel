    <div class="container delete_cart_url" data-url="{{ route('cart.deleteCart') }}">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info ">
            <table class="table table-condensed update_cart_url" data-url="{{ route('cart.updateCart') }}">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Item</td>
                    <td class="description"></td>
                    <td class="price">Price</td>
                    <td class="quantity">Quantity</td>
                    <td class="total">Total</td>
                    <td></td>
                </tr>
                </thead>
                @foreach($carts as $id => $cartItem)
                    <tbody>
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{ $cartItem['image']}}" style="width: 255px;height: 255px;object-fit: cover" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{ $cartItem['name']}}</a></h4>
                        </td>
                        <td class="cart_price">
                            <p>{{ number_format($cartItem['price']) }} VND</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <input type="text" name="quantity" min="1" value="{{ $cartItem['quantity'] }} " class="quantity" size="2">
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{ number_format($cartItem['price'] * $cartItem['quantity'])}} VND</p>
                        </td>

                        <td>
                            <a class="btn btn-primary cart_update" data-id="{{ $id }}" href="">Update</a>
                            <a class="btn btn-danger cart_delete" data-id="{{ $id }}" href="">Delete</a>
                        </td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
