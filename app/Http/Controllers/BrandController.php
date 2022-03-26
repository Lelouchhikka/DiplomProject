<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Brands;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function getBrand(Request $brand) {
        $brand=$brand->id;
        $singleBrand = Brand::find($brand);
        $name =$singleBrand->name;
        $products =$singleBrand->products;
        return view('brandIndex')->with(['product'=>$products,'name'=>$name]);
    }
    public function brand(){
        $cate=Brand::all();
        return view('brand')->with(['brands'=>$cate]);
    }
    public function index()
    {
        $data = Brands::latest()->paginate(5);

        return view('brands.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brands.create');
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
        ]);

        Brand::create($request->all());

        return redirect()->route('brands.index')
            ->with('success','Brand created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return view('brands.show',compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('brands.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $brand->update($request->all());

        return redirect()->route('brands.index')
            ->with('success','Brand updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('brands.index')
            ->with('success','Brand deleted successfully');
    }
}
