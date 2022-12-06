<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product; 

use App\Models\Stock;

use App\Models\TheModel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        //return response()->json($products);

        return view('listProducts',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createProducts');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request-> validate([
            'sku' => 'required | max:10',
            'size' => 'required | max:4',
            'model_id' => 'required |max:1',
        ]);

        $sku= $request->sku;
        $size= $request->size;
        $model_id= $request->model_id;
        $active = $request->active;

        Product::create([
            "sku" =>$sku,
            "size"=>$size,
            "model_id"=>$model_id,
            "active" =>$active
        ]);

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::findorfail($id);
        return view('listProduct', $product);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $product=Product::findorfail($id);
        return view('editProducts', $product);
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
        $request-> validate([
            'sku' => 'required | max:10',
            'size' => 'required | max:4',
            'model_id' => 'required |max:1',
        ]);

        $product = Product::findorfail($id);
        $product->sku = $request->input('sku');
        $product->size = $request->input('size');
        $product->model_id=$request->input('model_id');
        $product->active=$request->input('active');

        $product->save();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res=Product::findorfail($id);
        $res->delete();
        //return response()->json($res);
        return redirect()->route('product.index');
    }

   public function getListTrendsProducts(){
    return response()->json(Product::ListTrendsProducts()->get());
   }

   


}
