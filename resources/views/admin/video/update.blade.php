@extends('admin.layouts.master')


@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">

            <a href="{{ url('admin') }}"><button class="btn-primary btn-sm"><i class="fa fa-arrow-left"></i>Back</button></a>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>

    <form id="quickForm" method="POST" action="{{ route('admin.video.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $video->id }}">
        {{-- <input type="hidden" name="id" value="{{ $about->id }}"> --}}
        <div class="form-group">
            <label for="exampleInputEmail1">Video Title</label>
            <input type="text" value="{{ $video->title }}" name="title" class="form-control" placeholder="Video Title"
                required>
        </div>
        {{-- <div class="form-group">
            <label for="exampleInputEmail1">Video Description</label>
            <textarea id="summernote" type="text" value="" name="description" class="form-control"
                placeholder="Video Description" required>
                {{ $video->description }}
            </textarea>
        </div> --}}
    
        <div class="form-group">
            <label for="exampleInputEmail1">Video URL</label>
            <input type="url" value="{{ $video->vid_url }}" name="vid_url" class="form-control">
        </div>
    
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update Video</button>
        </div>
    </form>


@stop




