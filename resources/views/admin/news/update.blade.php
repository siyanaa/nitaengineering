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

    <form id="quickForm" method="POST" action="{{ route('admin.news.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="" name="id" value="{{ $news->id }}" hidden>
        <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Title.." value="{{ $news->title }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label><span style="color:red; font-size:large"> *</span>
                <textarea class="textarea-summernote" id="summernote" name="description">
                {{ $news->description }}
            </textarea>

            </div>

            <div class="form-group">
                <label for="file">PDF</label>
                <input type="file" name="file" class="form-control" id="file" onchange="previewImage(event)"
                    placeholder="PDF">
            </div>


            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control" id="image" onchange="previewImage(event)"
                    placeholder="Image">
                <img id="preview1" src="{{ url('uploads/news/image' . $news->image) }}"
                    style="max-width: 300px; max-height:300px" />
            </div>


        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn-primary">Update News</button>
        </div>
    </form>

    <script>
        const previewImage = e => {
            const reader = new FileReader();
            reader.readAsDataURL(e.target.files[0]);
            reader.onload = () => {
                const preview = document.getElementById('preview');
                preview.src = reader.result;
            };
        };
    </script>

@stop
