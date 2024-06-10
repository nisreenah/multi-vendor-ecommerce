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
                <a href="{{ route('products.create') }}" class="btn btn-primary">Add New Product</a>
            </div>
            <div class="btn-group">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#destroyModal">
                    Delete
                </button>

                <!-- Modal -->
                <div class="modal fade" id="destroyModal" tabindex="-1"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Are You Sure?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure that you want to delete this product?</p>
                                <p><strong>Note: </strong> All photo gallery of this product will delete also</p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close
                                </button>

                                <form action="{{ route('products.destroy', $product->id) }}" method="post">
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

{{--                <form action="{{ route('brands.destroy', $brand->id) }}" method="post">--}}
{{--                    @method('DELETE')--}}
{{--                    @csrf--}}
{{--                    <button type="submit" class="btn btn-danger px-5">--}}
{{--                        Yes, delete--}}
{{--                    </button>--}}
{{--                </form>--}}

            </div>
        </div>
    </div>

    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">Update Product</h5>
            <hr/>
            <div class="form-body mt-4">
                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">

                        <div class="col-lg-7">
                            <div class="border border-3 p-4 rounded">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                           value="{{old('name', $product->name)}}" placeholder="Enter product title">
                                </div>
                                <div class="mb-3">
                                    <label for="slug" class="form-label">Product slug</label>
                                    <input type="text" class="form-control" name="slug" id="slug"
                                           value="{{old('slug', $product->slug)}}" placeholder="Enter product slug">
                                </div>
                                <div class="mb-3">
                                    <label for="short_desc" class="form-label">Short Description</label>
                                    <textarea name="short_desc" class="form-control" id="short_desc"
                                              rows="2">{{ old('short_desc', $product->short_desc) }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="long_desc" class="form-label">Long Description</label>
                                    <textarea name="long_desc" class="form-control" id="long_desc"
                                              rows="3">{{ old('short_desc', $product->long_desc) }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Current Product Images</label>
                                    <div class="bg-light">
                                        <img src="{{ asset('upload/products/'. $product->image) }}" width="200">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Upload New Product Images</label>
                                    <div class="bg-light">
                                        <input type="file" name="image" class="form-control"
                                               accept=".jpg, .png, image/jpeg, image/png">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="gallery" class="form-label">Upload New Product Photo Gallery (Multiple
                                        selection)</label>
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
                                               value="{{old('selling_price', $product->selling_price)}}"
                                               placeholder="00.00">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="discount_price" class="form-label">Discount Price</label>
                                        <input type="text" name="discount_price" class="form-control"
                                               value="{{old('discount_price', $product->discount_price)}}"
                                               id="discount_price"
                                               placeholder="00.00">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="text" name="quantity" class="form-control"
                                               value="{{old('quantity', $product->quantity)}}" id="quantity"
                                               placeholder="00">
                                    </div>

                                    <div class="col-12">
                                        <label for="sub_category_id" class="form-label">Sub Category</label>
                                        <select name="sub_category_id" class="single-select form-control">
                                            @foreach($subCategories as $subCategory)
                                                <option value="{{ $subCategory->id }}"
                                                    {{ $subCategory->id == $product->sub_category_id ? 'selected' : '' }}>
                                                    {{ $subCategory->category->name }} : {{ $subCategory->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label for="brand_id" class="form-label">Brand Name</label>
                                        <select name="brand_id" class="single-select form-control">
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->id }}"
                                                    {{ $brand->id == $product->brand_id ? 'selected' : '' }}>
                                                    {{ $brand->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label for="user_id" class="form-label">Vendor Name</label>
                                        <select name="user_id" class="single-select form-control">
                                            @foreach($vendors as $vendor)
                                                <option value="{{ $vendor->id }}"
                                                    {{ $vendor->id == $product->user_id ? 'selected' : '' }}>
                                                    {{ $vendor->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="hot_deals"
                                                   id="hot_deals" value="{{ $product->hot_deals }}"
                                                {{ $product->hot_deals == 1 ? 'checked': '' }} >
                                            <label class="form-check-label" for="hot_deals">Hot Deals</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="featured"
                                                   id="featured" value="{{ $product->featured }}"
                                                {{ $product->featured == 1 ? 'checked': '' }} >
                                            <label class="form-check-label" for="featured">Featured</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="special_offer"
                                                   id="special_offer" value="{{ $product->special_offer }}"
                                                {{ $product->special_offer == 1 ? 'checked': '' }} >
                                            <label class="form-check-label" for="special_offer">Special Offer</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="special_deals"
                                                   id="special_deals" value="{{ $product->special_deals }}"
                                                {{ $product->special_deals == 1 ? 'checked': '' }} >
                                            <label class="form-check-label" for="special_deals">Special Deals</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="inputProductTags" class="form-label">Product Tags</label>
                                        <input type="text" name="tags" class="form-control" data-role="tagsinput"
                                               value="{{old('tags',$product->tags)}}">
                                    </div>


                                    <div class="col-12">
                                        <label for="sizes" class="form-label">Product Sizes</label>
                                        <input type="text" name="sizes" class="form-control" data-role="tagsinput"
                                               value="{{ old('sizes',$product->sizes) }}">
                                    </div>

                                    <div class="col-12">
                                        <label for="colors" class="form-label">Product Colors</label>
                                        <input type="text" name="colors" class="form-control" data-role="tagsinput"
                                               value="{{old('colors',$product->colors)}}">
                                    </div>

                                    <div class="col-6">
                                        <input class="form-check-input" type="radio" name="status" value="active"
                                               id="active" {{$product->status == 'active' ? 'checked': ''}}>
                                        <label class="form-check-label" for="active">Active</label>
                                    </div>
                                    <div class="col-6">
                                        <input class="form-check-input" type="radio" name="status" value="inactive"
                                               id="inactive" {{$product->status == 'inactive' ? 'checked': ''}}>
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

    <div class="row">
        <div class="card">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-lg-3 col-xl-4">
                        <h5 class="card-title">Product Photo Gallery</h5>
                    </div>
                    <div class="col-lg-3 col-xl-5"></div>
                    <div class="col-lg-3 col-xl-3 mb-3">
                        <a href="" class="btn btn-primary mb-3 mb-lg-0" data-bs-toggle="modal"
                           data-bs-target="#addModal"><i class='bx bxs-plus-square'></i>
                            Add New Photo
                        </a>
                        <!-- Modal -->
                        <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add New Photo To Gallery</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('gallery.store') }}" method="POST"
                                          enctype="multipart/form-data">
                                        @method('POST')
                                        @csrf
                                        <input type="hidden" class="form-control" name="product_id"
                                               value="{{ $product->id }}"/>

                                        <div class="modal-body">
                                            <div class="form-group">
                                                <input type="file" class="form-control" name="image" id="image"/>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <hr/>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
                @foreach($product->gallery as $image)
                    <div class="col">
                        <div class="card">
                            <img src="{{ asset('/upload/products/gallery/'.$image->image) }}" class="card-img-top"
                                 alt="...">
                            <div class="card-body">
                                <div class="clearfix">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{$image->id}}">
                                        <i class="bx bxs-trash"></i> Delete
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$image->id}}" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are You
                                                        Sure?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body">Are you sure that you want to delete this
                                                    item?
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                        Close
                                                    </button>

                                                    <form action="{{ route('gallery.destroy', $image->id) }}"
                                                          method="post">
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
                @endforeach

            </div><!--end row-->

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
