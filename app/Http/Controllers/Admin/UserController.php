<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $inputs = $request->all();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/users'), $filename);
            $inputs['photo'] = $filename;
        }

        $inputs['password'] = Hash::make($request->password);

        $user = User::create($inputs);
        $user->assignRole($request->role);
        event(new Registered($user));

        $notification = array(
            'message' => 'User has been created successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('users.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $inputs = $request->all();

        if ($request->hasFile('photo')) {

            // Delete old image
            if (!empty($user->photo)){
                $image_path = '/upload/users/' . $user->image;
                unlink(public_path() . $image_path);
            }

            $file = $request->file('photo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/users'), $filename);
            $inputs['photo'] = $filename;
        }

        $message = 'User has been updated successfully.';
        $alertType = 'success';

        $updated = $user->update($inputs);
        if (!$updated) {
            $message = 'User dose not updated successfully.!';
            $alertType = 'error';
        }

        $notification = array(
            'message' => $message,
            'alert-type' => $alertType
        );

        return redirect()->route('users.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Delete image
        if (!empty($user->photo)) {
            $image_path = '/upload/users/' . $user->photo;
            unlink(public_path() . $image_path);
        }

        $message = 'User has been deleted successfully.';
        $alertType = 'success';

        $deleted = $user->delete();
        if (!$deleted) {
            $message = 'User dose not deleted successfully.!';
            $alertType = 'error';
        }

        $notification = array(
            'message' => $message,
            'alert-type' => $alertType
        );

        return redirect()->route('users.index')->with($notification);
    }
}
