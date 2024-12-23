@extends('admin.layouts.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $page_title }}</h1>
                    <a href="{{ url('admin') }}"><button class="btn-primary btn-sm"><i class="fa fa-arrow-left"></i>
                            Back</button></a>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->



            <form id="quickForm" method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Title" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Image <span style="color:red;"></span></label>
                        <span style="color:red; font-size:large"> *</span>

                        <input type="file" name="image[]" id="" class="form-control" multiple onchange="previewImage1(event)" required>

                    </div>
                    <img id="preview1" style="max-width: 200px; max-height:200px" />

                    {{-- <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea id="summernote" name="description">
                    {{ old('content') }}
                </textarea>
                    </div> --}}



                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn-primary">Create Gallery Page</button>
                </div>
            </form>

            @if (isset($links) && is_array($links))


                <div class="p-4">

                    @foreach ($links as $link)
                        <a href="{{ $link[1] }}">
                            <button class="btn-primary">{{ $link[0] }}</button>
                        </a>
                    @endforeach
                </div>

            @endif
            <!-- /.row -->
            <!-- Main row -->

            <!-- /.row (main row) -->



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
