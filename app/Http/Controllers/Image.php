<?php

namespace App\Http\Controllers;

use App\Models\Model\Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get first 100 images and paginate
        return Image::paginate(100);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //save request file
        $image = $request->file('image');
        //get image name
        $image_name = time() . '_' . $image->getClientOriginalName();
        //move image to public/images/products
        $image->move(public_path('images/products'), $image_name);
        //create image
        $image = Image::create(['src' => $image_name]);
        //return image
        return $image;
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        //
    }
}
