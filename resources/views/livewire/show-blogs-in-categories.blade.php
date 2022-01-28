<div class="content content-boxed">
    <div class="row justify-content-center">



        @foreach ($blogs as $ind => $blog)

            <div class="col-lg-4">

                <a class="block block-rounded block-link-pop overflow-hidden"
                    href="{{ route('blog.show', [$blog->id, $blog->slug]) }}">
                    <img class="img-fluid" src="assets/media/photos/photo8@2x.jpg" alt="">
                    <div class="block-content">
                        <h4 class="mb-1">
                            {{ $blog->name }}
                        </h4>
                        <p class="fs-sm fw-medium mb-2">
                            <span class="text-primary"></span>
                            {{ $blog->created_at->format('F j, Y, g:i a') }} <span class="text-muted"></span>
                        </p>
                        <p class="fs-sm text-muted">
                            {{ substr(strip_tags(html_entity_decode($blog->text)), 0, 70) . ' ....' }}
                        </p>
                    </div>
                </a>
            </div>

        @endforeach

        <!-- Pagination -->
        {{ $blogs->links() }}
        <!-- END Pagination -->
    </div>
</div>
<!-- END Story -->
