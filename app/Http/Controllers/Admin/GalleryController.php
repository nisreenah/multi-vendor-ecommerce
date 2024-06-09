<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePhotoGalleryRequest;
use App\Http\Requests\UpdatePhotoGalleryRequest;
use App\Models\PhotoGallery;
use App\Models\Product;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StorePhotoGalleryRequest $request)
    {
        $inputs = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/products/gallery'), $filename);
            $inputs['image'] = $filename;
        }

        PhotoGallery::create($inputs);

        $notification = array(
            'message' => 'Product has been created successfully.',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show($product)
    {
        $product = Product::find($product);
        $gallery = $product->gallery()->get();
        return view('admin.gallery.show', compact('product', 'gallery'));
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
    public function update(UpdatePhotoGalleryRequest $request, PhotoGallery $photoGallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($photoGallery)
    {
        if (!empty($photoGallery->image)) {
            $image_path = '/upload/products/gallery' . $photoGallery->image;
            unlink(public_path() . $image_path);
        }

        $message = 'Photo gallery of the given product has been deleted successfully.';
        $alertType = 'success';

        $photoGallery = PhotoGallery::findOrFail($photoGallery);
        $deleted = $photoGallery->delete();
        if (!$deleted) {
            $message = 'Photo dose not deleted successfully.!';
            $alertType = 'error';
        }

        $notification = array(
            'message' => $message,
            'alert-type' => $alertType
        );

        return redirect()->back()->with($notification);
    }
}
