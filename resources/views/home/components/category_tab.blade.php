<div class="category-tab">
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach($categories as $indexCategory => $categoryItems )
            <li class="{{ $indexCategory == 0 ? 'active' : '' }}">
                <a href="#category_tab_{{ $categoryItems->id }}" data-toggle="tab">
                    {{ $categoryItems->name }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="tab-content">

        @foreach($categories as $indexCategoryProduct => $categoryItemProducts )
        <div class="tab-pane fade {{ $indexCategoryProduct == 0 ? 'active in' : ''}}" id="category_tab_{{ $categoryItemProducts->id }}">

            @foreach($categoryItemProducts->categoryChildrent as $productItemTabsParent)
                @foreach($productItemTabsParent->products as $index => $productItemTabs)
                    @break($index == 2)
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{ $productItemTabs->feature_image_path}}" style="width: 255px;height: 255px;object-fit: contain" alt="" />
                            <h2>{{ $productItemTabs->name }}</h2>
                            <p>{{ number_format($productItemTabs->price)}} VND</p>
                            <a href="#" class="btn btn-default add-to-cart"
                               data-url ="{{ route('cart.addToCart',['id' => $productItemTabs->id]) }}"
                            >
                                <i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
                @endforeach
            @endforeach
        </div>
        @endforeach
    </div>
</div>
