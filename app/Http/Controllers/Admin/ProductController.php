<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\PhotoGallery;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        $subCategories = SubCategory::all();
        $vendors = User::role('vendor')->active()->get();
        return view('admin.products.create', compact('brands', 'subCategories', 'vendors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        $inputs = $request->except(['gallery']);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/products'), $filename);
            $inputs['image'] = $filename;
        }

        $product = Product::create($inputs);

        if ($request->hasFile('gallery')) {
            $gallery = $request->file('gallery');

            foreach ($gallery as $file) {
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/products/gallery'), $filename);
                $galleryInputs['image'] = $filename;
                $galleryInputs['product_id'] = $product->id;
                PhotoGallery::create($galleryInputs);
            }
        }

        $notification = array(
            'message' => 'Product has been created successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('products.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $gallery = $product->gallery()->get();
        return view('admin.products.show', compact('product', 'gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $brands = Brand::all();
        $subCategories = SubCategory::all();
        $vendors = User::role('vendor')->active()->get();
        return view('admin.products.edit', compact('product', 'brands', 'subCategories', 'vendors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $inputs = $request->except(['gallery']);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/products'), $filename);
            $inputs['image'] = $filename;
        }

        $product->update($inputs);

        if ($request->hasFile('gallery')) {
            $gallery = $request->file('gallery');
            foreach ($gallery as $file) {
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/products/gallery'), $filename);
                $galleryInputs['image'] = $filename;
                $galleryInputs['product_id'] = $product->id;
                PhotoGallery::create($galleryInputs);
            }
        }

        $notification = array(
            'message' => 'Product has been created successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('products.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $image_path = '/upload/products/' . $product->image;
        unlink(public_path() . $image_path);

        $message = 'Product has been deleted successfully.';
        $alertType = 'success';

        $deleted = $product->delete();
        if (!$deleted) {
            $message = 'Product dose not deleted successfully.!';
            $alertType = 'error';
        }

        foreach ($product->gallery()->get() as $gallery) {
            $image_path = '/upload/products/gallery/' . $gallery->image;
            unlink(public_path() . $image_path);
        }

        $product->gallery()->delete();

        $notification = array(
            'message' => $message,
            'alert-type' => $alertType
        );
        return redirect()->route('products.index')->with($notification);
    }

}
