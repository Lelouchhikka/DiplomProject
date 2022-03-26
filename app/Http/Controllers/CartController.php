<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CartController extends Controller
{
    public function changeToRu(){
        session()->put('locale', 'ru');
        return back();
    }
    public function changeToEn(){
        session()->put('locale', 'en');
        return back();
    }
    public function shop()
    {
        $cate=Category::all();
        $products = Product::all();
        return view('shop')->with(['products' => $products, 'categories'=>$cate]);

    }
    public function cart()  {
        $cate=Category::all();
        $cartCollection = \Cart::getContent();
        return view('cart')->with(['cartCollection' => $cartCollection,'categories'=>$cate]);
    }
    public function add(Request $request){
        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->img,
                'slug' => $request->slug
            )
        ));
        return redirect()->route('cart.index');
    }
    public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('cart.index');
    }
    public function update(Request $request){
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
            ));
        return redirect()->route('cart.index');
    }
    public function clear(){
        \Cart::clear();
        return redirect()->route('home');
    }
}
