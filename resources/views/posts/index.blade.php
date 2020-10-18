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
                            <h3 class="panel-title">Posts</h3>
                            <div class="right">

                                <a href="{{ route('posts.add') }}" class="btn btn-sm btn-primary">add new posts</a>

                            </div>
                        </div>

                        <div class="panel-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">TITLE</th>
                                        <th scope="col">USER</th>
                                        <th scope="col">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $posts as $post )
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>
                                            <a href="{{ route('site.single.post', $post->slug) }}" class="btn btn-info btn-sm" role="button" target="_blank"><i class="lnr lnr-user"></i> View</a>
                                            <a href="" class="btn btn-warning btn-sm" role="button"><i class="lnr lnr-pencil"></i> Edit</a>
                                            <a href="" class="btn btn-danger btn-sm delete" role="button"><i class="lnr lnr-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop


@section('footer')
<script>
    $('.delete').on('click', function() {
        const siswa_id = $(this).attr('siswa-id');

        swal({
                title: "Yakin ?",
                text: "Data siswa dengan id " + siswa_id + " akan dihapus ??",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/siswa/delete/" + siswa_id + "";
                }
            });
    });
</script>
@endsection