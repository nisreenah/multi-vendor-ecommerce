<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Models\Brand;
use App\Models\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSliderRequest $request)
    {
        $inputs = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/sliders'), $filename);
            $inputs['image'] = $filename;
        }

        Slider::create($inputs);

        $notification = array(
            'message' => 'Slider has been created successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('sliders.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        $inputs = $request->all();

        if ($request->hasFile('image')) {

            // Delete old image
            $image_path = '/upload/sliders/' . $slider->image;
            unlink(public_path() . $image_path);

            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/sliders'), $filename);
            $inputs['image'] = $filename;
        }

        $message = 'Slider has been updated successfully.';
        $alertType = 'success';

        $updated = $slider->update($inputs);
        if (!$updated) {
            $message = 'Slider dose not updated successfully.!';
            $alertType = 'error';
        }

        $notification = array(
            'message' => $message,
            'alert-type' => $alertType
        );

        return redirect()->route('sliders.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $image_path = '/upload/sliders/' . $slider->image;
        unlink(public_path() . $image_path);

        $message = 'Slider has been deleted successfully.';
        $alertType = 'success';

        $deleted = $slider->delete();
        if (!$deleted) {
            $message = 'Slider dose not deleted successfully.!';
            $alertType = 'error';
        }

        $notification = array(
            'message' => $message,
            'alert-type' => $alertType
        );

        return redirect()->route('sliders.index')->with($notification);
    }
}
