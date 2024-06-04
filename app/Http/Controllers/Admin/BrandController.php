<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        $inputs = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/brands'), $filename);
            $inputs['image'] = $filename;
        }

        Brand::create($inputs);

        $notification = array(
            'message' => 'Brand has been created successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('brands.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $inputs = $request->all();

        if ($request->hasFile('image')) {

            // Delete old image
            $image_path = '/upload/brands/' . $brand->image;
            unlink(public_path() . $image_path);

            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/brands'), $filename);
            $inputs['image'] = $filename;
        }

        $message = 'Brand has been updated successfully.';
        $alertType = 'success';

        $updated = $brand->update($inputs);
        if (!$updated) {
            $message = 'Brand dose not updated successfully.!';
            $alertType = 'error';
        }

        $notification = array(
            'message' => $message,
            'alert-type' => $alertType
        );

        return redirect()->route('brands.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        // Delete image
        $image_path = '/upload/brands/' . $brand->image;
        unlink(public_path() . $image_path);

        $message = 'Brand has been deleted successfully.';
        $alertType = 'success';

        $deleted = $brand->delete();
        if (!$deleted) {
            $message = 'Brand dose not deleted successfully.!';
            $alertType = 'error';
        }

        $notification = array(
            'message' => $message,
            'alert-type' => $alertType
        );

        return redirect()->route('brands.index')->with($notification);
    }
}
