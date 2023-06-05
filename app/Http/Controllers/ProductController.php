<?php

namespace App\Http\Controllers;

use App\Models\Model\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Model\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get first 100 products and paginate
        return ProductResource::collection(Product::paginate(100));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {       
        if($request->validated()) {
            //loop over images array and download the image from url in src key
            $images = [];
            foreach($request->images as $image) {
                $image_name = time() . '_' . $request->slug . '.png';
                $image_path = $image['src'];
                $image_file = file_get_contents($image_path);
                file_put_contents(public_path('images/products/' . $image_name), $image_file);
                $savedImage = Image::create(['src' => $image_name]);
                array_push($images, $savedImage->id);
            }

            //set images array to request
            $request->merge(['images' => json_encode($images)]);

            //save categories and tags as empty array if null
            if(!$request->categories) {
                $request->merge(['categories' => json_encode([])]);
            } else {
                $request->merge(['categories' => json_encode($request->categories)]);
            }

            if(!$request->tags) {
                $request->merge(['tags' => json_encode([])]);
            } else {
                $request->merge(['tags' => json_encode($request->tags)]);
            }

            //store product
            $product = Product::create($request->all());
    
            //return created product
            return ProductResource::make($product);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
