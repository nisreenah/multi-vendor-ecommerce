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
                <a href="{{ route('brands.create') }}" type="button" class="btn btn-primary">Add New Brand</a>
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
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Image</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($brands as $brand)
                        <tr>
                            <td>{{ $brand->id }}</td>
                            <td>{{ $brand->name }}</td>
                            <td>{{ $brand->slug }}</td>
                            <td>
                                <img class="" width="100px" src="{{ asset('upload/brands/'. $brand->image ) }}">
                            </td>
                            <td>{{ $brand->updated_at }}</td>
                            <td>
                                {{-- <a href="#" class="btn btn-info"><i class="lni lni-eye"></i></a>--}}
                                {{--                                <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-success">--}}
                                {{--                                    <i class="fadeIn animated bx bx-pencil"></i>--}}
                                {{--                                </a>--}}

                                <div class="d-flex order-actions">
                                    <a href="{{ route('brands.edit', $brand->id) }}" class=""><i
                                            class="bx bxs-edit"></i></a>
                                    <a href="javascript:;" class="ms-3"><i class="bx bxs-trash"></i></a>
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
