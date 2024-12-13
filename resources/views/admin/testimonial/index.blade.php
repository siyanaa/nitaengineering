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

<!-- Content Header (Page header) -->

<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">{{ $page_title }}</h1>
        <a href="{{ url('admin/testimonial/create') }}"><button class="btn-primary btn-sm"><i class="fa fa-plus"></i>Add
                Testimonial</button></a>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->


<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Image</th>
            <th>Position</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($testimonials as $testimonial)
        <tr data-widget="expandable-table" aria-expanded="false">
            <td>{{ $testimonial->name ?? '' }}</td>
            <td> <img id="preview1" src="{{ asset('uploads/testimonial/' . $testimonial->image) }}"
                    style="width: 150px; height:150px" /></td>
            <td>{{ $testimonial->position ?? '' }}</td>
            <td>{!! $testimonial->description ?? '' !!}</td>

            <td>
                <div style="display: flex; flex-direction:row;">

                    <button type="button" class="btn-warning button-size" data-bs-toggle="modal"
                        data-bs-target="#edit{{ $testimonial->id }}">
                        Update
                    </button>
                </div>

                <div style="display: flex; flex-direction:row;">

                    <button type="button" class="btn-danger button-size" data-bs-toggle="modal"
                        data-bs-target="#delete{{ $testimonial->id }}">
                        Delete
                    </button>
                </div>

            </td>
        </tr>
        @endforeach
    </tbody>
    @foreach ($testimonials as $testimonial)
    <div class="modal fade" id="edit{{ $testimonial->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                    <a href="{{ url('admin/testimonial/edit/' . $testimonial->id) }}">
                        <button type="button" class="btn btn-danger">Yes
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @foreach ($testimonials as $testimonial)
    <div class="modal fade" id="delete{{ $testimonial->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                    <a href="{{ url('admin/testimonial/destroy/' . $testimonial->id) }}">
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