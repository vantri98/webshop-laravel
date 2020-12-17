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
    <!--/slider-->
    @include('home.components.slider')
    <!--slider-->
    <section>
        <div class="container">
            <div class="row">
                @include('components.sidebar')
                <div class="col-sm-9 padding-right">
                    <!--features_items-->
                    @include('home.components.feature_product')
                    <!--features_items-->

                    <!--/category-tab-->
                    @include('home.components.category_tab')
                    <!--/category-tab-->

                    <!--/recommended_items-->
                    @include('home.components.recommend_product');
                    <!--/recommended_items-->

                </div>
            </div>
        </div>
    </section>


@endsection

