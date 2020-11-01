<?php

namespace App\Http\Controllers;
use App\models\ProductCategory;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $productcategory=ProductCategory::all();
        return view('website.backend.product_category.index',compact('productcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.backend.product_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'brand_name' => ['required', 'max:255'],
        ]);
        $slug=Str::slug($request->brand_name,'-');
        ProductCategory::create([
           'brand_name'=>$request->brand_name,
            'slug'=>$slug   
        ]);
        return redirect()->route('product_category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $productcategory=ProductCategory::all();
        //dd($productcategory);


            return view('website.backend.product_category.update',compact('productcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $productcategory=ProductCategory::find($id);

        $slug=Str::slug($request->brand_name,'-');
        $productcategory->update([
            'brand_name'=>$request->brand_name,
            'slug'=>$slug
        ]);
        return redirect()->route('product_category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productcategory=ProductCategory::findorfail($id);
        if(is_null($productcategory)) {
            abort(404);
        }
        $productcategory->delete();
        return redirect()->route('product_category.index');
    }

}
