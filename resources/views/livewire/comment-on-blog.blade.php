<div id="comments">


    <div class="mt-5">
        <h3 >Comments</h3>

        @forelse ($blogComments as $comment)
            <div class="d-flex fs-sm">
                <a class="flex-shrink-0 img-link me-2" href="javascript:void(0)">
                    <img class="img-avatar img-avatar48 img-avatar-thumb"
                        src="{{ asset('/media/avatars/avatar4.jpg') }}" alt="">
                </a>
                <div class="flex-grow-1">
                    <p>
                        <a class="fw-semibold" href="javascript:void(0)">{{ $comment->username }}</a>
                        {{ $comment->comment }}
                    </p>
                    <p>
                        <a class="text-dark me-2" href="javascript:void(0)">
                            <i class="fa fa-reply fa-fw text-muted"></i> {{ $comment->created_at->diffForHumans() }}
                        </a>

                    </p>
                </div>
            </div>
            <hr>

        @empty
            <p>No comments yet, be the first one to comment</p>
        @endforelse

    </div>
    <!-- Actions -->
    <div class="d-flex fs-sm mb-5">

        <form wire:submit.prevent='addComment'>

            <div class="row">

                <div class="col-lg-12">
                    <textarea class="form-control" wire:model.lazy="comment" style="width: 100%" rows="6" cols="100"
                        placeholder="Type your comment ..."></textarea>

                    @error('comment')

                        <div class="text-danger font-weight-bold">{{ $message }}</div>

                    @enderror

                </div>

                <div class="col-lg-12 mt-3 text-right">

                    <button type="submit" class="btn btn-lg rounded-0 btn-secondary me-1 mb-3">
                        <i class="fas fa-paper-plane"></i></i> Add Comment
                    </button>

                </div>
            </div>


        </form>
    </div>
    <!-- END Actions -->


</div>

@section('js_after')

    <script>

        window.addEventListener('commentAdded', event => {

            var elmntToView = document.getElementById("comments");
            elmntToView.scrollIntoView();

        })
    </script>

@endsection
