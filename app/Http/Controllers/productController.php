<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;
use Session;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = new product();
        $datas = $products::paginate(5);

        return view('products.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productname = $request['product_name'];
        $product = new Product();

        $product->product_name = $productname;
        $product->product_category = $request['product_category'];
        $product->product_detail = $request['product_detail'];
        $product->product_price = $request['product_price'];
        $product->created_at = time();
        $product->updated_at = time();

        $product_image = $request->file('product_image');

        if($product_image->isValid()){
            $ext = $product_image->getClientOriginalExtension(); //jpg
            $path = public_path() .'/uploads/products/';
            $filename = $productname.rand(111,999).'.'.$ext;
            $product_image->move($path , $filename);
        }
        $product->product_image = $filename;

        $product->save();

        if($product->save()){
            return redirect()->route('addProduct')->with('message', 'Your new product is been successfully added');
        }else{
            return view('error.503');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $viewproduct = Product::find($id);

        return view('products.view',compact('viewproduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $viewproduct = Product::find($id);
//        print_r($viewproduct);die();
        return view('products.edit',compact('viewproduct'));
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
        $updateproduct = Product::find($id);

        $updateproductname = $request['product_name'];

        $updateproduct->product_name = $updateproductname;
        $updateproduct->product_category = $request['product_category'];
        $updateproduct->product_detail = $request['product_detail'];
        $updateproduct->product_price = $request['product_price'];
        $updateproduct->updated_at = time();

        $product_image = $request->file('product_image');

        if($product_image->isValid()){
            $ext = $product_image->getClientOriginalExtension(); //jpg
            $path = public_path() .'/uploads/products/';
            $filename = $updateproductname.rand(111,999).'.'.$ext;
            $product_image->move($path , $filename);
        }
        $updateproduct->product_image = $filename;

        $updateproduct->save();

        if($updateproduct->save()){
            return redirect()->route('addProduct')->with('message', 'Your new product '.$updateproductname.' is been successfully updated');
        }else{
            return view('error.503');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteproduct = product::find($id);
        $deleteproduct->delete();
        return redirect()->route('addProduct')->with('message', 'Your product '.$deleteproduct->product_name.' is been deleted Successfully');
    }

    public function getClothingCategory(){
        $clothingdata = product::getAllProducts();
        return view('products.search',compact('clothingdata'));
    }
}
