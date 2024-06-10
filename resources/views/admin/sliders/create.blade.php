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

                    <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="border p-4 rounded">

                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0 text-info"><i class="bx bx-video-recording"></i> Create A New Slider</h5>
                            </div>
                            <hr/>

                            <div class="row mb-3">
                                <label for="main_title" class="col-sm-3 col-form-label">Slider Main Title</label>
                                <div class="col-sm-9">
                                    <input name="main_title" type="text" class="form-control" id="main_title"
                                           value="{{ old('main_title') }}" placeholder="Slider Main Title">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="sub_title" class="col-sm-3 col-form-label">Slider Sub Title</label>
                                <div class="col-sm-9">
                                    <input name="sub_title" type="text" class="form-control" id="sub_title"
                                           value="{{ old('sub_title') }}" placeholder="Slider Sub Title">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image" class="col-sm-3 col-form-label">Slider Image</label>
                                <div class="col-sm-9">
                                    <input name="image" type="file" class="form-control" id="image" >
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
