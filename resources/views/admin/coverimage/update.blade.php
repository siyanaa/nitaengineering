@extends('admin.layouts.master')


@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form id="quickForm" method="POST" action="{{ route('admin.coverimage.update') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $coverimage->id }}">
                {{-- <input type="hidden" name="id" value="{{ $about->id }}"> --}}
                <div class="form-group">
                    <label for="title">Title</label><span style="color:red; font-size:large"> *</span>
                    <input style="width:auto;" type="text" name="title" class="form-control" id="title"
                        placeholder="Title" value="{{ $coverimage->title }}">
                </div>



                <div class="form-group">
                    <label for="image">Image</label><span style="color:red; font-size:large"> *</span>
                    <input type="file" name="image" class="form-control" id="image" onchange="previewImage(event)"
                        placeholder="Image" required>
                    <img id="preview1" src="{{ url('uploads/coverimage/' . $coverimage->image) }}"
                        style="max-width: 300px; max-height:300px" />
                </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
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
