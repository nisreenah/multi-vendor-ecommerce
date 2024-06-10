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

                    <form action="{{ route('banners.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0 text-info"><i class="bx bx-repeat"></i> Create A New Banner</h5>
                            </div>
                            <hr/>

                            <div class="row mb-3">
                                <label for="title" class="col-sm-3 col-form-label">Banner Title</label>
                                <div class="col-sm-9">
                                    <input name="title" type="text" class="form-control" id="title"
                                           value="{{ old('title') }}" placeholder="Banner Title">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="url" class="col-sm-3 col-form-label">Banner URL</label>
                                <div class="col-sm-9">
                                    <input name="url" type="url" class="form-control" id="url"
                                           value="{{ old('url') }}" placeholder="URL">
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
