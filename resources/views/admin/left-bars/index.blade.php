@extends("layouts.admin-backend")
@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/buttons.bootstrap5.min.css') }}">
@endsection

@php
    $imagePath="storage/left-bars"
@endphp


@section('content')


    <!-- Page Content -->
    <div class="content">

        <a href="{{ route('admin.left-bars.create') }}" class="btn btn-primary push">Add</a>


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Left bar card
                </h3>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons fs-sm">
                    <thead>
                        <tr>
                            <th >#</th>
                            <th>Link</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($leftBars as $ind => $leftBar)
                            <tr>
                                <td>{{ ++$ind }}</td>
                                <td>
                                <a href="{{ $leftBar->link }}" href="__blank">{{ $leftBar->link }}</a>
                                </td>
                                <td>
                                    <img class="img-fluid" src="{{ asset($imagePath."/".$leftBar->image) }}" alt="">
                                </td>
                                <td>{{ substr(strip_tags( html_entity_decode($leftBar->description)), 0, 100) . " ...." }}</td>

                                <td>
                                    <div class="btn-group" role="group" aria-label="Horizontal Primary">
                                        <a href="{{ route('admin.left-bars.edit', $leftBar->id) }}"
                                            class="btn btn-sm btn-alt-primary">Edit</a>
                                        <form id="form-{{ $leftBar->id }}"
                                            action="{{ route('admin.left-bars.destroy', $leftBar->id) }}" method="POST">
                                            @method("DELETE")
                                            @csrf
                                            <input type="button" onclick="confirmDelete({{ $leftBar->id }})"
                                                class="btn btn-sm btn-alt-danger" value="Delete">

                                        </form>
                                    </div>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- END Page Content -->

@endsection

@section('js_after')

    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-bs5/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.colVis.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        function confirmDelete(id) {
            swal({
                    title: "Are you sure?",
                    // text: "There may be orders associated with this label, and the orders will get delete to!!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $("#form-" + id).submit();
                    }
                });

        }
    </script>
@endsection
