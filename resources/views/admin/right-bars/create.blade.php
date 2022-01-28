@extends("layouts.admin-backend")
@section('css_before')
@endsection



@section('content')


    <!-- Page Content -->
    <div class="content">

        <a href="{{ route('admin.right-bars.index') }}" class="btn btn-primary push">Back to all</a>





        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Add New Right Bar</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option">
                        <i class="si si-settings"></i>
                    </button>
                </div>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.right-bars.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="row mb-4">

                        <div class="col-lg-12">
                            <label class="form-label" for="link">Link</label>
                            <input type="text" required class="form-control" id="link" name="link">
                        </div>

                    </div>

                    <div class="row mb-4">

                        <div class="col-lg-6">
                            <label class="form-label" for="link">Image</label>
                            <input type="file" required class="form-control" id="link" name="image">
                        </div>

                    </div>

                    <div class="mb-4">
                        <!-- CKEditor Container -->
                        <label class="form-label" for="js-ckeditor">Description</label>

                        <textarea class="form-control" name="description" required></textarea>
                    </div>

                    <div class="mb-4 ">

                        <div class="col-lg-12 text-right">

                            <button class="btn btn-primary">Add</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>


    </div>
    <!-- END Page Content -->


@endsection

@section('js_after')


    {{-- <script src="assets/js/oneui.app.min.js"></script> --}}
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/plugins/simplemde/simplemde.min.js') }}"></script>

    <!-- Page JS Helpers (CKEditor + SimpleMDE plugins) -->
    <script>
        One.helpersOnLoad(['js-ckeditor', 'js-simplemde']);
    </script>

@endsection
