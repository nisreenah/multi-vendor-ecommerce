@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-xl-4">
                            <a href="" class="btn btn-primary mb-3 mb-lg-0" data-bs-toggle="modal"
                               data-bs-target="#addModal"><i class='bx bxs-plus-square'></i>
                                Add New Gallery Photo
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
                                        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                                            @method('POST')
                                            @csrf
                                            <input type="hidden" class="form-control" name="product_id" value="{{ $product->id }}"/>

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
                        <div class="col-lg-3 col-xl-5"></div>
                        <div class="col-lg-3 col-xl-3">
                            <a href="{{ route('products.index') }}" class="btn btn-secondary mb-3 mb-lg-0">
                                <i class='bx bxs-plus-square'></i>
                                Back To All Products
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
        @foreach($gallery as $image)
            <div class="col">
                <div class="card">
                    <img src="{{ asset('/upload/products/gallery/'.$image->image) }}" class="card-img-top" alt="...">
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
@endsection
