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

    <form id="quickForm" method="POST" action="{{ route('admin.faq.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="" name="id" value="{{ $faq->id }}" hidden>
        <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Title.." value="{{ $faq->title }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label><span style="color:red; font-size:large"> *</span>
                <textarea class="textarea-summernote" id="summernote" name="description">
                {{ $faq->description }}
            </textarea>
            </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn-primary">Update FAQ</button>
        </div>
    </form>

@stop
