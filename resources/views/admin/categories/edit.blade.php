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

                    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="border p-4 rounded">

                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                                </div>
                                <h5 class="mb-0 text-info">Update Category</h5>
                            </div>
                            <hr/>

                            <div class="row mb-3">
                                <label for="name" class="col-sm-3 col-form-label">Category Name</label>
                                <div class="col-sm-9">
                                    <input name="name" value="{{ old('name', $category->name) }}" type="text"
                                           class="form-control" id="name" placeholder="Category Name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="slug" class="col-sm-3 col-form-label">Slug</label>
                                <div class="col-sm-9">
                                    <input name="slug" value="{{ old('slug', $category->slug) }}" type="text"
                                           class="form-control" id="slug" placeholder="slug-name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image" class="col-sm-3 col-form-label">Upload The Category Image</label>
                                <div class="col-sm-9">
                                    <input name="image" type="file" class="form-control" id="image">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image" class="col-sm-3 col-form-label">Current Image</label>

                                <div class="col-sm-9">
                                    <img class="" border="2" width="250px"
                                         src="{{ asset('upload/categories/'. $category->image ) }}">
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

                                    <form action="{{ route('categories.destroy', $category->id) }}" method="post">
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
@endsection
