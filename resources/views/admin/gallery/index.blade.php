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
        <a href="{{ url('admin/gallery/create') }}"><button class="btn-primary btn-sm"><i class="fa fa-plus"></i>Add
                Gallery</button></a>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
        </ol>
    </div>
</div>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Title</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($galleries as $gallery)
        <tr data-widget="expandable-table" aria-expanded="false">
            <td>{{ $gallery->title ?? '' }}</td>
            <td>
                @php
                    $images = is_string($gallery->image) ? json_decode($gallery->image) : $gallery->image;
                @endphp
                @if(is_array($images) || is_object($images))
                    @foreach($images as $imageurl)
                        <img src="{{ asset($imageurl) }}" style="max-width: 100px; max-height: 100px; margin: 2px;">
                    @endforeach
                @endif
            </td>
            <td>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                        data-bs-target="#edit{{ $gallery->id }}">
                        Update
                    </button>
                    <button type="button" class="btn btn-danger btn-sm ms-2" data-bs-toggle="modal"
                        data-bs-target="#delete{{ $gallery->id }}">
                        Delete
                    </button>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@foreach ($galleries as $gallery)
<!-- Edit Modal -->
<div class="modal fade" id="edit{{ $gallery->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $gallery->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $gallery->id }}">Update Gallery</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to update this gallery?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <a href="{{ url('admin/gallery/edit/' . $gallery->id) }}" class="btn btn-primary">Yes</a>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="delete{{ $gallery->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $gallery->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $gallery->id }}">Delete Gallery</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                This can't be undone. Are you sure you want to delete this gallery?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <a href="{{ url('admin/gallery/destroy/' . $gallery->id) }}" class="btn btn-danger">Yes</a>
            </div>
        </div>
    </div>
</div>
@endforeach

@push('scripts')
<script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    if (myModal && myInput) {
        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
    }
</script>
@endpush

@stop