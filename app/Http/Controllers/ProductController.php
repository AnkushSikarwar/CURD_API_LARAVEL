<?php

namespace App\Http\Controllers;

use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\ProductRequest;
class ProductController extends Controller
{

    public function __construct(){
        $this->middleware('auth:api')->except('index','show');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProductResource::collection(Product::paginate(20));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {

        // $validate = $request->validate([
        //     'name' => 'required|max:255',
        //     'description'=>'required',
        //     'price'=> 'required|numeric',
        //     'dicount' => 'required|numeric'
        // ]);
        // $product = Product::create($validate);
        // return response() ->json($product, 201);

        $product = new product;
        $product->name = $request->name;

        $product->description = $request->description;

        $product->price = $request->price;

        $product->discount = $request->discount;
        $product->save();
        return response([

            'data' => new ProductResource($product)
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // return response()->json($product, 200);
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        // $validate = $request->validate([
        //     'name' => 'required|max:255',
        //     'description'=>'required',
        //     'price'=> 'required|numeric',
        //     'dicount' => 'required|numeric'
        // ]);

        // $product->update($validate);
        // return response()->json($product, 200);
        $product->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'discount' => $request->input('discount'),
        ]);

        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {

        $product->delete();
        return response('Deleted', 200);
    }


}
