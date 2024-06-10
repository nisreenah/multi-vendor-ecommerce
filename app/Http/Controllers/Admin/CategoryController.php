<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/categories'), $filename);
            $inputs['image'] = $filename;
        }

        Category::create($inputs);

        $notification = array(
            'message' => 'Category has been created successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('categories.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        // show all sub categories of the given main category
        $categories = $category->subCategories()->get();
        return view('admin.sub-categories.index', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $inputs = $request->all();

        if ($request->hasFile('image')) {

            // Delete old image
            $image_path = '/upload/categories/' . $category->image;
            unlink(public_path() . $image_path);

            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/categories'), $filename);
            $inputs['image'] = $filename;
        }

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

        return redirect()->route('categories.index')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Delete image
        $image_path = '/upload/categories/' . $category->image;
        unlink(public_path() . $image_path);

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

        return redirect()->route('categories.index')->with($notification);
    }
}
