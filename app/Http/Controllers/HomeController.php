<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $sliders;
    private $categories;
    private $products;
    public function __construct(Slider $sliders, Category  $categories, Product $products)
    {
        $this->sliders = $sliders;
        $this->categories = $categories;
        $this->products = $products;
    }

    public function index()
    {
        $sliders = $this->sliders->latest()->get();
        $categories = $this->categories->where('parent_id', 0)->get();
        $products = $this->products->latest()->take(6)->get();
        $productsRecommend = $this->products->latest('views_count', 'desc')->take(6)->get();
        $categoryLimit = $this->categories->where('parent_id', 0)->take(2)->get();
        return view('home.home', compact('sliders', 'categories', 'products', 'productsRecommend', 'categoryLimit'));
    }

    public function category($slug, $id)
    {
        $categoryLimit = $this->categories->where('parent_id', 0)->take(2)->get();
        $products = $this->products->where('category_id', $id)->paginate(12);
        $categories = $this->categories->where('parent_id', 0)->get();
        return view('product.category.list', compact('categoryLimit', 'products', 'categories'));
    }

    public function addToCart($id)
    {
        $product = $this->products->find($id);
        $cart = session()->get('cart');
        if(isset($cart[$id])){
            $cart[$id]['quantity'] =  $cart[$id]['quantity'] + 1;
        }else{
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->feature_image_path
            ];
        }
        session()->put('cart', $cart);
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }

    public function showCart()
    {
        $carts = session()->get('cart');
        $categoryLimit = $this->categories->where('parent_id', 0)->take(2)->get();
        return view('product.cart.cart', compact('carts', 'categoryLimit'));
    }

    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity) {
            $carts = session()->get('cart');
            $carts[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cartComponent = view('product.components.cart_components', compact('carts'))->render();
            return response()->json(['cart_component' => $cartComponent, 'code' => 200], 200);
        }
    }

    public function deleteCart(Request $request)
    {
        if($request->id) {
            $carts = session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cartComponent = view('product.components.cart_components', compact('carts'))->render();
            return response()->json(['cart_component' => $cartComponent, 'code' => 200], 200);
        }
    }

}
