@extends('admin.master')

@section('styles')
    <link href="{{ asset('backend/assets/plugins/simplebar/css/simplebar.css') }} " rel="stylesheet"/>
    <link href="{{ asset('backend/assets/plugins/fancy-file-uploader/fancy_fileupload.css') }}" rel="stylesheet"/>
    <link href="{{ asset('backend/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet"/>
    <link href="{{ asset('backend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('backend/assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet"/>

    <link href="{{ asset('backend/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('backend/assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet"/>

@endsection

@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">eCommerce</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('products.index') }}" type="button" class="btn btn-primary">All Products</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">Add New Product</h5>
            <hr/>
            <div class="form-body mt-4">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-lg-7">
                            <div class="border border-3 p-4 rounded">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                           value="{{old('name')}}" placeholder="Enter product title">
                                </div>
                                <div class="mb-3">
                                    <label for="slug" class="form-label">Product slug</label>
                                    <input type="text" class="form-control" name="slug" id="slug"
                                           value="{{old('slug')}}" placeholder="Enter product slug">
                                </div>
                                <div class="mb-3">
                                    <label for="short_desc" class="form-label">Short Description</label>
                                    <textarea name="short_desc" class="form-control" id="short_desc"
                                              rows="2">{{ old('short_desc') }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="long_desc" class="form-label">Long Description</label>
                                    <textarea name="long_desc" class="form-control"
                                              id="long_desc" rows="3">{{ old('short_desc') }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Product Images</label>
                                    <div class="bg-light">
                                        <input type="file" name="image" class="form-control"
                                               accept=".jpg, .png, image/jpeg, image/png">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="gallery" class="form-label">Product Photo Gallery</label>
                                    <div class="bg-light">
                                        <input type="file" name="gallery[]" class="form-control"
                                               accept=".jpg, .png, image/jpeg, image/png" multiple>
                                        {{-- id="fancy-file-upload"--}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="border border-3 p-4 rounded">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="selling_price" class="form-label">Selling Price</label>
                                        <input type="text" name="selling_price" class="form-control" id="selling_price"
                                               value="{{old('selling_price')}}" placeholder="00.00">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="discount_price" class="form-label">Discount Price</label>
                                        <input type="text" name="discount_price" class="form-control"
                                               value="{{old('discount_price')}}" id="discount_price"
                                               placeholder="00.00">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="text" name="quantity" class="form-control"
                                               value="{{old('quantity')}}" id="quantity" placeholder="00">
                                    </div>

                                    <div class="col-12">
                                        <label for="sub_category_id" class="form-label">Sub Category</label>
                                        <select name="sub_category_id" class="single-select form-control">
                                            @foreach($subCategories as $subCategory)
                                                <option
                                                    value="{{ $subCategory->id }}">{{ $subCategory->category->name }}
                                                    : {{ $subCategory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label for="brand_id" class="form-label">Brand Name</label>
                                        <select name="brand_id" class="single-select form-control">
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label for="user_id" class="form-label">Vendor Name</label>
                                        <select name="user_id" class="single-select form-control">
                                            @foreach($vendors as $vendor)
                                                <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="hot_deals"
                                                   id="hot_deals" value="{{ 1 }}">
                                            <label class="form-check-label" for="hot_deals">Hot Deals</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="featured"
                                                   id="featured" value="{{ 1 }}">
                                            <label class="form-check-label" for="featured">Featured</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="special_offer"
                                                   id="special_offer" value="{{ 1 }}">
                                            <label class="form-check-label" for="special_offer">Special Offer</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="special_deals"
                                                   id="special_deals" value="{{ 1 }}">
                                            <label class="form-check-label" for="special_deals">Special Deals</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="inputProductTags" class="form-label">Product Tags</label>
                                        <input type="text" name="tags" class="form-control" data-role="tagsinput"
                                               value="{{old('tags','bag,shoes')}}">
                                    </div>


                                    <div class="col-12">
                                        <label for="sizes" class="form-label">Product Sizes</label>
                                        <input type="text" name="sizes" class="form-control" data-role="tagsinput"
                                               value="{{ old('sizes','S,M') }}">
                                    </div>

                                    <div class="col-12">
                                        <label for="colors" class="form-label">Product Colors</label>
                                        <input type="text" name="colors" class="form-control" data-role="tagsinput"
                                               value="{{old('colors','Red,Black')}}">
                                    </div>

                                    <div class="col-6">
                                        <input class="form-check-input" type="radio" name="status" value="active"
                                               id="active" checked>
                                        <label class="form-check-label" for="active">Active</label>
                                    </div>
                                    <div class="col-6">
                                        <input class="form-check-input" type="radio" name="status" value="inactive"
                                               id="inactive">
                                        <label class="form-check-label" for="inactive">Inactive</label>
                                    </div>

                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Save Product</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end row-->
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('backend/assets/plugins/metismenu/js/metisMenu.min.js') }} "></script>
    <script src="{{ asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/fancy-file-uploader/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/fancy-file-uploader/jquery.fileupload.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/fancy-file-uploader/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/input-tags/js/tagsinput.js') }}"></script>

    <script>
        $('#fancy-file-upload').FancyFileUpload({
            params: {
                action: 'fileuploader'
            },
            maxfilesize: 1000000
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#image-uploadify').imageuploadify();
        })
    </script>

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
