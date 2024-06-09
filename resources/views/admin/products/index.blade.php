@extends('admin.master')

@section('styles')
    <link href="{{ asset('backend/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"/>
@endsection

@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Tables</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-cookie"></i> Brands</a>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('products.create') }}" type="button" class="btn btn-primary">Add New Product</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    {{--    <h6 class="mb-0 text-uppercase">DataTable Example</h6>--}}
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-hover" style="width:100%">
                    <thead>
                    <tr class="table-primary">
                        <th>ID</th>
                        <th>Code</th>
                        <th>Title</th>
                        <th>Selling Price</th>
                        <th>Discount Price</th>
                        <th>Status</th>
                        <th>Vendor</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->code }}</td>
                            <td>{{ $product->name }}</td>
                            <td class="text-center">{{ $product->selling_price }}</td>
                            <td class="text-center">{{ $product->discount_price }}</td>
                            <td>
                                @if($product->status == 'active')
                                    <span class="badge rounded-pill bg-info">Active</span>
                                @else
                                    <span class="badge rounded-pill bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>{{ $product->user->name }}</td>

                            <td>
                                <div class="d-flex order-actions">
                                    <a href="{{ route('gallery.show', $product->id) }}" class="ms-3">
                                        <i class="fadeIn animated bx bx-images"></i>
                                    </a>

                                    <a href="{{ route('products.edit', $product->id) }}" class="ms-3">
                                        <i class="bx bxs-edit"></i>
                                    </a>

                                    <a href="{{ route('products.show', $product->id) }}" class="ms-3">
                                        <i class="lni lni-eye"></i>
                                    </a>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script src="{{ asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
    <script>
        $(document).ready(function () {
            var table = $('#example2').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print']
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
