@extends('admin.layouts.master')


@section('content')

@if (session('successMessage'))
<div class="alert alert-success">
    {!! session('successMessage') !!}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
    {!! session('error') !!}
</div>
@endif

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ $page_title }}</h1>
                <a href="{{ url('admin/video/create') }}"><button class="btn-primary btn-sm"><i
                            class="fa fa-plus"></i>Add
                        Video</button></a>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Video Title</th>
            {{-- <th>Video Description</th> --}}
            <th>Video URL</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($videos as $video)
        <tr data-widget="expandable-table" aria-expanded="false">
            <td>{{ $video->title ?? '' }}</td>
            {{-- <td>{{ $video->description ?? '' }}</td> --}}
            <td>{{ $video->vid_url ?? '' }}</td>


            <td>
                <div style="display: flex; flex-direction:row;">

                    <button type="button" class="btn-warning button-size" data-bs-toggle="modal"
                        data-bs-target="#edit{{ $video->id }}">
                        Update
                    </button>
                </div>

                <div style="display: flex; flex-direction:row;">

                    <button type="button" class="btn-danger button-size" data-bs-toggle="modal"
                        data-bs-target="#delete{{ $video->id }}">
                        Delete
                    </button>
                </div>

            </td>
        </tr>
        @endforeach
    </tbody>

    @foreach ($videos as $video)
    <div class="modal fade" id="delete{{ $video->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                    <a href="{{ url('admin/video/destroy/' . $video->id) }}">
                        <button type="button" class="btn btn-danger">Yes
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    {{-- Update --}}
    @foreach ($videos as $video)
    <div class="modal fade" id="edit{{ $video->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                    <a href="{{ url('admin/video/edit/' . $video->id) }}">
                        <button type="button" class="btn btn-danger">Yes
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</table>


<script>
    var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
</script>








@stop