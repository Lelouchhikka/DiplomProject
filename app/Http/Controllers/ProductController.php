<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cate=Category::all();
        $data = Product::latest()->paginate(5);
        return view('products.index',compact('data'))
            ->with(['i'=>(request()->input('page', 1) - 1) * 5,'categories'=>$cate]);
    }

    public function id($id){
        $data=Product::all();
        $cate=Category::all();

        if($data->contains($id)){
            foreach ($data as $item) {
                if($item->id==$id){
                    return view('productIndex')->with(['item'=>$item,'categories'=>$cate]);}
            }
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate=Category::all();

        return view('products.create')->with(['categories'=>$cate]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'details' => 'required',
            'price'=>'required',
            'shipping_cost'=>'required',
            'category_id'=>'required',
            'brand_id'=>'required',
            'image_path'=>'required',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')
            ->with('success','Product created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $cate=Category::all();
        return view('products.show',compact('product'))->with(['categories'=>$cate]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $cate=Category::all();
        return view('products.edit',compact('product'))->with(['categories'=>$cate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $input = $request->all();

        if ($image = $request->file('image_path')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image_path'] = "$profileImage";
        }else{
            unset($input['image_path']);
        }

        $product->update($input);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required',
            'details' => 'required',
            'price'=>'required',
            'shipping_cost'=>'required',
            'description'=>'required',
            'category_id'=>'required',
            'brand_id'=>'required',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }

        $validator->validated();

        $product->update($request->all());

        return redirect()->route('category.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success','Product deleted');
    }
}
