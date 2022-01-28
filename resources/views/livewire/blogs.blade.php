<div class="content content-boxed">
    <div class="row">

        {{-- @php
    $imagePath="storage/left-bars"
@endphp --}}


        {{-- left side starts --}}
        <div class="col-lg-2">
            <div class="row ">

                @foreach ($leftBars as $ind => $leftBar)

                    <div class="col-lg-12">
                        <a class="block block-rounded block-link-pop overflow-hidden" href="{{ $leftBar->link }}">
                            <img class="img-fluid" src="{{ asset('storage/left-bars/' . $leftBar->image) }}"
                                alt="">
                            <div class="block-content">

                                <p class="fs-sm text-primary">
                                    {{  $leftBar->description  }}
                                </p>
                            </div>
                        </a>
                    </div>

                @endforeach

            </div>
        </div>
        {{-- left side ends --}}



        <!-- Story -->
        <div class="col-lg-8">

            <div class="row ">
                @foreach ($blogs as $ind => $blog)

                    <div class="col-lg-6">

                        <a class="block block-rounded block-link-pop overflow-hidden"
                            href="{{ route('blog.show', [$blog->id, $blog->slug]) }}">
                            <div class="block-content">
                                <h4 class="mb-1">
                                    {{ $blog->name }}
                                </h4>
                                <p class="fs-sm fw-medium mb-2">
                                    <span class="text-primary"></span>
                                    {{ $blog->created_at->format('F j, Y, g:i a') }} <span
                                        class="text-muted"></span>
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




        {{-- right side starts --}}


        <div class="col-lg-2">
            <div class="row ">

                @foreach ($rightBars as $ind => $rightBar)

                    <div class="col-lg-12">
                        <a class="block block-rounded block-link-pop overflow-hidden" href="{{ $rightBar->link }}">
                            <img class="img-fluid" src="{{ asset('storage/right-bars/' . $rightBar->image) }}"
                                alt="">
                            <div class="block-content">

                                <p class="fs-sm text-primary">
                                    {{ $rightBar->description }}
                                </p>
                            </div>
                        </a>
                    </div>

                @endforeach

            </div>
        </div>


        {{-- right side ends --}}


    </div>

</div>
