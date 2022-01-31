@extends("layouts.admin-backend")
@section('content')


    <!-- Page Content -->
    <div class="content content-boxed">
        <!-- User Profile -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Header</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.headers.update', $header->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method("PUT")
                    @csrf

                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="fs-sm text-muted">
                                Header Heading and Logo
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="mb-4">

                                <label class="form-label" for="heading">Heading </label>
                                <input required type="text" class="form-control" id="heading" name="heading"
                                    placeholder="Enter your heading" value="{{ $header->heading }}">
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="image">Image</label>
                                <input type="file" class="form-control mb-2" id="image" name="image">
                                <img src="{{ asset("header/".$header->image) }}" width="300px" height="200px" alt="">
                            </div>


                            <div class="mb-4">
                                <button type="submit" class="btn btn-alt-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END User Profile -->


        <!-- END Connections -->
    </div>
    <!-- END Page Content -->


@endsection
