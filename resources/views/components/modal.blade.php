@section('modal')
    <button type="button" class="btn btn-primary btn-add" data-toggle="modal" data-target="#videoModal" data-whatever="@mdo">Add Video</button>
    <style>
        .btn-add {
            position: absolute;
            width: 150px;
            height: 50px;
            left: 47%;
        }
    </style>

    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">New video</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add-video" action="{{ route('add-video', \Illuminate\Support\Facades\Auth::id()) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Name:</label>
                            <input name="name" type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="description-text" class="col-form-label">Description:</label>
                            <textarea name="description" class="form-control" id="description-text"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="video" class="col-form-label">Video:</label>
                            <input type="file" name="video" class="form-control-file" id="video" alt="Choose video" value="Video">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input form="add-video" type="submit" class="btn btn-primary" value="Save">
                </div>
            </div>
        </div>
    </div>
@endsection

@yield('modal')
