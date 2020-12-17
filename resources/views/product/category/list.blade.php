@extends('layouts.master')
@section('title')
    <title>Home | E-Shopper</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('home/home.css') }}">
@endsection

@section('js')
    <link rel="stylesheet" href="{{ asset('home/home.js') }}">
    <script>
        function addToCart(event){
            event.preventDefault();
            let urlCart = $(this).data('url');
            $.ajax({
                type: "GET",
                url: urlCart,
                dataType: 'json',
                success: function (data){
                    if(data.code === 200){
                        alert('Them San Pham thanh cong');
                    }
                },
                error: function (){

                }
            });
        }

        $(function(){
            $('.add-to-cart').on('click', addToCart);
        })
    </script>
@endsection

@section('content')

    <section>
        <div class="container">
            <div class="row">
                @include('components.sidebar')

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Features Items</h2>

                        @foreach($products as $product)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{ $product->feature_image_path }}" style="width: 255px;height: 255px;object-fit: contain" alt="" />
                                        <h2>{{ number_format($product->price) }}</h2>
                                        <p>{{ $product->name }}</p>
                                        <a href="#" class="btn btn-default add-to-cart"
                                           data-url ="{{ route('cart.addToCart',['id' => $product->id]) }}"
                                        ><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>{{ number_format($product->price) }}</h2>
                                            <p>{{ $product->name }}</p>
                                            <a href="#" class="btn btn-default add-to-cart"
                                               data-url ="{{ route('cart.addToCart',['id' => $product->id]) }}"
                                            ><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                       {{ $products->links() }}
                    </div><!--features_items-->
                </div>
            </div>
        </div>
    </section>
@endsection






