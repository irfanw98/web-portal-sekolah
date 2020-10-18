@extends('template.master')

@section('title', 'Posts')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Add new posts</h3>
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <form action="{{ route('posts.create') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group {{ $errors->has('title') ? ' has->error ' : '' }}">
                                            <label for="title">Title :</label>
                                            <input type="text" class="form-control" id="title" name="title" placeholder="title" value="{{ old('title') }}">

                                            @if($errors->has('title'))
                                            <span class=" help-block">{{ $errors->first('title') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group {{ $errors->has('content') ? ' has->error ' : '' }}">
                                            <label for="content">Content :</label>
                                            <textarea class="form-control" name="content" id="content" rows="3">{{ old('content') }}</textarea>

                                            @if($errors->has('content'))
                                            <span class=" help-block">{{ $errors->first('content') }}</span>
                                            @endif
                                        </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                                <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </span>
                                        <input id="thumbnail" class="form-control" type="text" name="thumbnail">
                                    </div>
                                    <img id="holder" style="margin-top:15px;max-height:100px;">

                                    <div class="input-group">
                                        <button type="submit" class="btn btn-info">Simpan</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('footer')

<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .catch(error => {
            console.error(error);
        });

    $('#lfm').filemanager('image');
</script>

@endsection