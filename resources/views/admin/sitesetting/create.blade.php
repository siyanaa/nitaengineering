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

            <form id="quickForm" method="POST" action="{{ route('admin.sitesetting.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control"
                             placeholder="Address">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control"
                             placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control"
                             placeholder="email">
                    </div>
    
                    <div class="form-group">
                        <label for="global certification">Global certification</label>
                        <input type="text" name="global_certification" class="form-control"
                             placeholder="Global certification">
                    </div>
    
                    <div class="form-group">
                        <label for="facebook link">facebook link</label>
                        <input type="text" name="facebook_link" class="form-control"
                             placeholder="Facebook link">
                    </div>
    
                    <div class="form-group">
                        <label for="instragram link">Instragram Link</label>
                        <input type="text" name="instagram_link" class="form-control"
                             placeholder="Instagram link">
                    </div>
    
                    <div class="form-group">
                        <label for="github link">Github Link</label>
                        <input type="text" name="github_link" class="form-control"
                             placeholder="Github link">
                    </div>
    
                    <div class="form-group">
                        <label for="twitter link">twitter Link</label>
                        <input type="text" name="twitter_link" class="form-control"
                             placeholder="twitter link">
                    </div>
                    <div class="form-group">
                        <label for="mainlogo">Main Logo</label>
                        <input type="file" name="main_logo" class="form-control"
                             placeholder="Main Logo">
                    </div>
                    <div class="form-group">
                        <label for="sidelogo">Side Logo</label>
                        <input type="file" name="side_logo" class="form-control"
                             placeholder="Side Logo">
                    </div>
    

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn-primary">Create Sitesetting Page</button>
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
