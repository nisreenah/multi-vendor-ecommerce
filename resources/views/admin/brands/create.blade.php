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

                    <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="border p-4 rounded">

                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                                </div>
                                <h5 class="mb-0 text-info">Create A New Brand</h5>
                            </div>
                            <hr/>

                            <div class="row mb-3">
                                <label for="name" class="col-sm-3 col-form-label">Brand Name</label>
                                <div class="col-sm-9">
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Brand Name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="slug" class="col-sm-3 col-form-label">Slug</label>
                                <div class="col-sm-9">
                                    <input name="slug" type="text" class="form-control" id="slug" placeholder="slug-name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image" class="col-sm-3 col-form-label">Brand Image</label>
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
