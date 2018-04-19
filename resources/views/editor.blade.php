@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a new post</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="/add" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Enter title" name="title">
                            <small id="titleHelp" class="form-text text-muted">Let's create something new</small>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Type here..." rows="3" name="body"></textarea>
                        </div>
                        <input type="hidden" name="file" value="" id="files">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <form action="{{ url('/upload')}}" class="dropzone mt-2" id="my-awesome-dropzone" enctype="multipart/form-data">
                        @csrf
                        <div class="fallback">
                            <input name="file" type="file" multiple />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    Dropzone.options.myAwesomeDropzone = {
        init: function() {
            this.on("success", function(file, responseText) {
                document.getElementById('files').value = responseText;
            });
        }
    };
</script>
@endsection
