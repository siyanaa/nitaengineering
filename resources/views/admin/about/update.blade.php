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
 

    <!-- Main content -->

    
  
    <form id="quickForm" method="POST" action="{{ route('admin.about.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $about->id }}">
        {{-- <input type="hidden" name="id" value="{{ $about->id }}"> --}}
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" value="{{ $about->title }}" name="title" class="form-control"
                placeholder="Title" required>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Image</label>
            <input type="file" name="image" class="form-control" onchange="previewImage(event)"
                placeholder="Image" required>
        </div>
        <img id="preview" style="max-width: 500px; max-height:500px" />

        <div class="form-group">
            <label for="exampleInputEmail1">Content</label>
            <textarea id="summernote" name="content">
        {{ $about->content }}
        </textarea>
        </div>


<!-- /.card-body -->
<div class="card-footer">
    <button type="submit" class="btn-primary">Update About</button>
</div>
</form>
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
