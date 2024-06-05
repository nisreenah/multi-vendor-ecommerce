@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <div class="card border-top border-0 border-4 border-info">
                <div class="card-body">

                    <div class="mb-3">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="border p-4 rounded">

                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                                </div>
                                <h5 class="mb-0 text-info">Update User</h5>
                            </div>
                            <hr/>

                            <div class="row mb-3">
                                <label for="name" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input name="name" value="{{ old('name', $user->name) }}" type="text"
                                           class="form-control" id="name" placeholder="Name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="username" class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input id="username" name="username" type="text" class="form-control"
                                           value="{{old('username', $user->username)}}" required autofocus
                                           autocomplete="username"/>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input id="email" name="email" type="email" class="form-control"
                                           value="{{old('email', $user->email)}}" required autofocus
                                           autocomplete="email"/>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                                <div class="col-sm-9">
                                    <input id="phone" name="phone" type="tel" class="form-control"
                                           value="{{old('phone', $user->phone)}}" autocomplete="phone"/>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="address" class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="address"
                                              name="address">{{old('address', $user->address)}}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="status" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <input class="form-check-input"
                                               {{$user->status == 'active' ? 'checked' :''}}
                                               type="radio" name="status"
                                               id="active" value="active">
                                        <label class="form-check-label" for="active">Active</label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <input class="form-check-input"
                                               {{$user->status == 'inactive' ? 'checked' :''}}
                                               type="radio" name="status" id="inactive"
                                               value="inactive">
                                        <label class="form-check-label" for="inactive">Inactive</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="photo" class="col-sm-3 col-form-label">Upload A New Image</label>
                                <div class="col-sm-9">
                                    <input name="photo" type="file" class="form-control" id="photo">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image" class="col-sm-3 col-form-label">Current Image</label>

                                <div class="col-sm-9">
                                    <img class="" border="2" width="200px"
                                         src="{{ asset('/upload/users/'. $user->photo ) }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-primary px-5">Update</button>
                                </div>
                                <div class="col-sm-2">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are You Sure?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">Are you sure that you want to delete this item?
                                </div>

                                <div class="modal-footer">

                                    <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">
                                        Close
                                    </button>

                                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger px-5">
                                            Yes, delete
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-xl-9 mx-auto">
            <div class="card border-top border-0 border-4 border-info">
                <div class="card-body">

                    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('put')

                        <div class="border p-4 rounded">

                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                                </div>
                                <h5 class="mb-0 text-info">Update User Password</h5>
                            </div>
                            <hr/>

                            <div class="row mb-3">
                                <label for="update_password_current_password"
                                       class="col-sm-3 col-form-label">{{ __('Current Password') }}</label>
                                <div class="col-sm-9">
                                    <input name="current_password" type="password"
                                           class="form-control" id="update_password_current_password"
                                           placeholder="current-password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="update_password_password"
                                       class="col-sm-3 col-form-label">{{ __('New Password') }}</label>
                                <div class="col-sm-9">
                                    <input id="update_password_password" name="password" type="password"
                                           class="form-control"
                                           required autofocus autocomplete="new-password"/>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="update_password_password_confirmation"
                                       class="col-sm-3 col-form-label">{{ __('Confirm Password') }}</label>
                                <div class="col-sm-9">
                                    <input name="password_confirmation" type="password"
                                           class="form-control" id="update_password_password_confirmation"
                                           placeholder="new-password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-primary px-5">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!--end row-->
@endsection
