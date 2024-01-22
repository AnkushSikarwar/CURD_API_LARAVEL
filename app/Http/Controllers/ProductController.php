<?php

namespace App\Http\Controllers;

use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Database\Eloquent\MassAssignmentException;
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


      $product = new Product;

      $product->name = $request->name;
      $product->description = $request->description;
      $product->price = $request->price;
      $product->discount = $request->discount;
      $product->save();
      return response([

        'data' => new ProductResource($product)
      ],Response::HTTP_CREATED);



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

    //    $this->authorize('update', $product);

    //    $validatedData = $request->validated([
    //     'name' => $request->name,
    //     'description' => $request->description,
    //     'price' => $request->price,
    //     'discount' => $request->discount,
    // ]);

    // $product->update($validatedData);

    // return response()->json($product, 200);

    try{
        $product = Product::find($product);
        if(!$product){
            return response()->json([
                'message'=>'Product not found'
            ],404);
        }
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount = $request->discount;

        //Return json Response
        return response()->json([

            'message' => "Product successfully updated"
        ],200);
    }
    catch(\Exception $e){
        return response()->json([
            'message' => 'Something went really wrong!'
        ],500);
    }
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
