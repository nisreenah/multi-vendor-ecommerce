<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = SubCategory::all();
        return view('admin.sub-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.sub-categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubCategoryRequest $request)
    {
        $inputs = $request->all();

        SubCategory::create($inputs);

        $notification = array(
            'message' => 'Category has been created successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('sub-categories.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $category)
    {
        return view('admin.sub-categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubCategoryRequest $request, SubCategory $category)
    {
        $inputs = $request->all();

        $message = 'Category has been updated successfully.';
        $alertType = 'success';

        $updated = $category->update($inputs);
        if (!$updated) {
            $message = 'Category dose not updated successfully.!';
            $alertType = 'error';
        }

        $notification = array(
            'message' => $message,
            'alert-type' => $alertType
        );

        return redirect()->route('sub-categories.index')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $category)
    {
        $message = 'Category has been deleted successfully.';
        $alertType = 'success';

        $deleted = $category->delete();
        if (!$deleted) {
            $message = 'Category dose not deleted successfully.!';
            $alertType = 'error';
        }

        $notification = array(
            'message' => $message,
            'alert-type' => $alertType
        );

        return redirect()->route('sub-categories.index')->with($notification);
    }
}
