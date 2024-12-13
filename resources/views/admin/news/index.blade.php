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

<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">{{ $page_title }}</h1>
        <a href="{{ url('admin') }}"><button class="btn-primary btn-sm"><i class="fa fa-arrow-left"></i>
                Back</button></a>

        <a href="{{ url('admin/news/create') }}"><button class="btn-primary btn-sm"><i class="fa fa-plus"></i> Add
                News</button></a>

    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
</div>


<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>File</th>

            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($news as $new)
        <td>{{ $new->title }}</td>
        <td>{!! $new->description !!}</td>
        <td>
            <img id="preview" src="{{ asset('uploads/news/image/' . $new->image)}}"
                style="width: 150px; height:150px" />
        </td>
        <td>{{ $new->file ?? "" }}</td>

        <td>
            <button type="button" class="btn-warning button-size" data-bs-toggle="modal"
                data-bs-target="#edit{{ $new->id }}">
                Update
            </button>

            <button type="button" class="btn-danger button-size" data-bs-toggle="modal" data-bs-target="#delete{{ $new->id }}">
                Delete
            </button>


        </td>
        </tr>
        @endforeach
    </tbody>

    @foreach ($news as $new )
    <div class="modal fade" id="delete{{ $new->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                    <a href="{{ url('admin/news/destroy/'.$new->id) }}">
                        <button type="button" class="btn btn-danger">Yes
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @endforeach

    @foreach ($news as $new )
    <div class="modal fade" id="edit{{ $new->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                    <a href="{{ url('admin/news/edit/'.$new->id) }}">
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
    const previewImage = e => {
            const reader = new FileReader();
            reader.readAsDataURL(e.target.files[0]);
            reader.onload = () => {
                const preview = document.getElementById('preview');
                preview.src = reader.result;
            };
        };
// For dialog
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
</script>



@stop