<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use PhpParser\Node\Scalar\String_;

class CategoryController extends Controller
{
    public function getCategory(Request $category) {
        $id=$category->id;
        $sort=$category->sort;
        $category=$id;
        $singleCategory = Category::find($category);
        $name =$singleCategory->name;
        $cate=Category::all();

        if($sort =="LowToHigh"){
            $products =$singleCategory->products->sortBy('price');
            return view('categoryIndex')->with(['product'=>$products,'name'=>$name, 'id'=>$id, 'categories'=>$cate]);
        }elseif ($sort == "HighToLow"){
            $products =$singleCategory->products->sortByDesc('price');
            return view('categoryIndex')->with(['product'=>$products,'name'=>$name, 'id'=>$id, 'categories'=>$cate]);
        }

        $products =$singleCategory->products;
        return view('categoryIndex')->with(['product'=>$products,'name'=>$name, 'id'=>$id, 'categories'=>$cate]);
    }
    public function category(){
        $categories=Category::all();
        return view('category')->with(['categories'=>$categories]);
    }
    public function index()
    {
        $cate=Category::all();
        $data = Category::latest()->paginate(5);
        return view('categories.index',compact('data'))
            ->with(['i', (request()->input('page', 1) - 1) * 5,'categories'=>$cate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate=Category::all();

        return view('categories.create')->with(['categories'=>$cate]);
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

        Category::create($request->all());

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $cate=Category::all();
        return view('categories.show',compact('category'))->with(['categories'=>$cate]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $cate=Category::all();

        return view('categories.edit',compact('category'))->with(['categories'=>$cate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $cate=Category::all();

        $category->update($request->all());

        return redirect()->route('categories.index')->with(['categories'=>$cate]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        $cate=Category::all();

        return redirect()->route('categories.index')->with(['categories'=>$cate]);
    }
}
