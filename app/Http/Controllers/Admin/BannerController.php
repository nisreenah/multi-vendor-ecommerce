<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $banners = Banner::all();
       return view('admin.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBannerRequest $request)
    {
        $inputs = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/banners'), $filename);
            $inputs['image'] = $filename;
        }

        Banner::create($inputs);

        $notification = array(
            'message' => 'Brand has been created successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('banners.index')->with($notification);

    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        $inputs = $request->all();

        if ($request->hasFile('image')) {

            $image_path = '/upload/banners/' . $banner->image;
            unlink(public_path() . $image_path);

            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/banners'), $filename);
            $inputs['image'] = $filename;
        }

        $message = 'Banner has been updated successfully.';
        $alertType = 'success';

        $updated = $banner->update($inputs);
        if (!$updated) {
            $message = 'Banner dose not updated successfully.!';
            $alertType = 'error';
        }

        $notification = array(
            'message' => $message,
            'alert-type' => $alertType
        );

        return redirect()->route('banners.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $image_path = '/upload/banners/' . $banner->image;
        unlink(public_path() . $image_path);

        $message = 'Banner has been deleted successfully.';
        $alertType = 'success';

        $deleted = $banner->delete();
        if (!$deleted) {
            $message = 'Banner dose not deleted successfully.!';
            $alertType = 'error';
        }

        $notification = array(
            'message' => $message,
            'alert-type' => $alertType
        );

        return redirect()->route('banners.index')->with($notification);
    }
}
