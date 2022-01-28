@extends("layouts.admin-backend")
@section('css_before')
@endsection

@php
    $imagePath="storage/left-bars"
@endphp

@section('content')


    <!-- Page Content -->
    <div class="content">

        <a href="{{ route('admin.left-bars.index') }}" class="btn btn-primary push">Back to all</a>





        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit Left Bar # {{ $leftBar->id }}</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option">
                        <i class="si si-settings"></i>
                    </button>
                </div>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.left-bars.update',$leftBar->id) }}" method="POST" enctype="multipart/form-data">
                    @method("PUT")
                    @csrf

                    <div class="row mb-4">

                        <div class="col-lg-12">
                            <label class="form-label" for="link">Link</label>
                            <input type="text" required class="form-control" id="link" name="link" value="{{ $leftBar->link }}">
                        </div>

                    </div>

                    <div class="row mb-4">

                        <div class="col-lg-6">
                            <label class="form-label" for="link">Image</label>
                            <input type="file" class="form-control" id="link" name="image">
                            <img class="mt-3" height="200px" width="200px" src="{{ asset($imagePath."/".$leftBar->image) }}" alt="">

                        </div>

                    </div>

                    <div class="mb-4">
                        <!-- CKEditor Container -->
                        <label class="form-label" for="js-ckeditor">Description</label>

                        <textarea class="form-control" name="description" required>{{ $leftBar->description }}</textarea>
                    </div>

                    <div class="mb-4 ">

                        <div class="col-lg-12 text-right">

                            <button class="btn btn-primary">Update</button>
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
