@extends('admin.master')

@section('styles')
    <link href="{{ asset('backend/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
@endsection

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

                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="border p-4 rounded">

                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                                </div>
                                <h5 class="mb-0 text-info">Add A New User</h5>
                            </div>
                            <hr/>

                            <div class="row mb-3">
                                <label for="role" class="col-sm-3 col-form-label">Role</label>
                                <div class="col-sm-9">
                                    <select name="role" class="single-select form-control">
                                        <option value="admin">Admin</option>
                                        <option value="vendor">Vendor</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input name="name" type="text" class="form-control" value="{{ old('name') }}"  id="name" placeholder="Name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="username" class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input name="username" type="text" value="{{ old('username') }}"  class="form-control" id="name" placeholder="Username">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input name="email" type="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="Email">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password_confirmation" class="col-sm-3 col-form-label">Password Confirmation</label>
                                <div class="col-sm-9">
                                    <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Password Confirmation">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                                <div class="col-sm-9">
                                    <input name="phone" type="tel" class="form-control" value="{{ old('phone') }}"  id="phone" placeholder="Phone">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="address" class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="address" name="address">{{old('address')}}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="status" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <input class="form-check-input" checked type="radio" name="status"
                                               id="active" value="active">
                                        <label class="form-check-label" for="active">Active</label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="inactive"
                                               value="inactive">
                                        <label class="form-check-label" for="inactive">Inactive</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="photo" class="col-sm-3 col-form-label">User Image</label>
                                <div class="col-sm-9">
                                    <input name="photo" type="file" class="form-control" id="photo" >
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-info px-5">Create</button>
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


@section('scripts')
    <script src="{{ asset('backend/assets/plugins/select2/js/select2.min.js') }}"></script>
    <script>
        $('.single-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
        $('.multiple-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
    </script>
@endsection
