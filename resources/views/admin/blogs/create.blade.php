@extends("layouts.admin-backend")
@section('css_before')
@endsection



@section('content')


    <!-- Page Content -->
    <div class="content">

        <a href="{{ route('admin.blogs.index') }}" class="btn btn-primary push">Back to all blogs</a>





        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Add New Blog</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option">
                        <i class="si si-settings"></i>
                    </button>
                </div>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.blogs.store') }}" method="POST">

                    @csrf

                    <div class="row mb-4">

                        <div class="col-lg-6">
                            <label for="category" class="form-label" >Category</label>
                            <select name="category" required id="category" class="form-control">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" required class="form-control" id="name" name="name">
                        </div>

                    </div>

                    <div class="mb-4">
                        <!-- CKEditor Container -->
                        <textarea id="js-ckeditor" name="text" required></textarea>
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
