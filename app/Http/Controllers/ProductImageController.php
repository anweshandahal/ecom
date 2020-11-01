<?php

namespace App\Http\Controllers;

use App\models\Product;
use Illuminate\Http\Request;
use App\models\ProductImage;
use Illuminate\Support\Str;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productImage=ProductImage::all();
        return view('website.backend.productimage.index',compact('productImage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product=Product::all();

        return view('website.backend.productimage.create',compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $slug=Str::slug($request->img_title,'-');
        // $request->merge(['brand_name',$slug]);
        $image = time().'.'.$request->img->extension();

        $request->img->move(public_path('images'), $image);



        ProductImage::create([
            'img_title'=>$request->img_title,
            'img'=>$image,
                //  Let's do everything her
            'product_id'=>$request->product_id,

            'slug'=>$slug,

        ]);
        return redirect()->route('productImage.index');
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
    public function edit(ProductImage $productImage)
    {
        $product=Product::all();
        return view('website.backend.productimage.update',compact('productImage','product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductImage $productImage)
    {
        $slug=Str::slug($request->img_title,'-');
        // $request->merge(['brand_name',$slug]);
     if ($request->img!=NULL)
     {
        $image = time().'.'.$request->img->extension();

        $request->img->move(public_path('images'), $image);
            }else{
//
//
//
         $image=$productImage->img;
     }


        $productImage->update([
            'img_title'=>$request->img_title,
            'img'=>$image,
            //  Let's do everything her
            'product_id'=>$request->product_id,

            'slug'=>$slug,

        ]);
        return redirect()->route('productImage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductImage $productImage)
    {
        $productImage->delete();
        return redirect()->route('productImage.index');
    }
}
