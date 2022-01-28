@extends('layouts.user-backend')

@section('page_title', 'Blog - ' . $blog->name)

@section('content')





    <div class="content content-boxed">
        <div class="text-center fs-sm push">
            <span class="d-inline-block py-2 px-4 bg-body fw-medium rounded">
                <a class="link-effect" href="be_pages_generic_profile.html"></a> on
                {{ $blog->created_at->format('F j, Y, g:i a') }}<span></span>
            </span>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <!-- Story -->
                <h1 class="mb-5 text-center">
                    {{ $blog->name }}
                </h1>
                <article class="story">
                    {!! $blog->text !!}
                </article>
                <!-- END Story -->


               <livewire:comment-on-blog :blog="$blog">
            </div>
        </div>





    </div>






@endsection
