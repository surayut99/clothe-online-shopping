<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.product-list',[
            'products' => $products
        ]);
    }

    public function productDetail()
    {
        $products = Product::all();
        return view('product.product_detail',[
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //add new product
//        $this->authorize('create', Post::class);
//        $request->validate([
//            'title'=>'required|min:5|max:100',
//            'content'=>'required|min:5|max:500'
//        ]);
//        $post = new Post;
//        $post->title = $request->input('title');
//        $post->content = $request->input('content');
////        $post->user_id = $request->user()->id;
////        ตอนเราสร้างโพสต์ก็จะดึงชื่อ  username  เขียนลงดาต้าเบส
//        $post->user_id = Auth::user()->id;
//        $post->save();
//        return redirect()->route('posts.index');

//        $this->authorize('');
        $product = new Product;
        $product->product_name = $request->input('product_name');
        $product->product_description = $request->input('product_description');
        $product->product_img_path = $request->input('product_img_path');
        $product->product_primary_type = $request->input('product_primary_type');
        $product->product_secondary_type = $request->input('product_secondary_type');
        $product->color = $request->input('color');
        $product->size = $request->input('size');
        $product->qty = $request->input('qty');
        $product->price = $request->input('price');
        $product->seller_id = $request->input('seller_id');
//        $product->recommended = $request->input('recommended');
        return redirect()->route('product.product-list');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
