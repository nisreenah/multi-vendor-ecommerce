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

                    <form action="{{ route('sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="border p-4 rounded">

                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                                </div>
                                <h5 class="mb-0 text-info">Update Slider</h5>
                            </div>
                            <hr/>

                            <div class="row mb-3">
                                <label for="main_title" class="col-sm-3 col-form-label">Slider Main Title</label>
                                <div class="col-sm-9">
                                    <input name="main_title" value="{{ old('main_title', $slider->main_title) }}"
                                           class="form-control" id="main_title" placeholder="Slider Main Title">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="sub_title" class="col-sm-3 col-form-label">Slider Sub Title</label>
                                <div class="col-sm-9">
                                    <input name="sub_title" value="{{ old('sub_title', $slider->main_title) }}"
                                           class="form-control" id="sub_title" placeholder="Slider Sub Title">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image" class="col-sm-3 col-form-label">Upload A Slider Image</label>
                                <div class="col-sm-9">
                                    <input name="image" type="file" class="form-control" id="image">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Current Image</label>

                                <div class="col-sm-9">
                                    <img class="img-fluid img-thumbnail" src="{{ asset('upload/sliders/'. $slider->image ) }}" />
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

                                    <form action="{{ route('sliders.destroy', $slider->id) }}" method="post">
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
