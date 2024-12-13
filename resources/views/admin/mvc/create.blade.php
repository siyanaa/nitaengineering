@extends('admin.layouts.master')


@section('content')

    <div class="row mb-2">
        <div class="col-sm-6">
            {{-- <h1 class="m-0">{{ $page_title }}</h1> --}}
            <a href="{{ url('admin') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i>
                    Back</button></a>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <!-- /.content-header -->


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



    <form id="quickForm" method="POST" action="{{ route('admin.mvc.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">


            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Title" required>
            </div>


            <div class="form-group">
                <label for="Description">Description</label><span style="color:red; font-size:large">
                    *</span>
                <textarea style="max-width: 50%;" type="text" class="form-control" name="description" id="description"
                    placeholder="Add Description" value="{{ old('description') }}"></textarea>
            </div>



        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create Mvc</button>
        </div>
    </form>



    <!-- Main row -->






@stop
