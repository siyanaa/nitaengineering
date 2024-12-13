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
                    {{-- <h1 class="m-0">{{ $page_title }}</h1> --}}
                    <a href="{{ url('admin/sitesetting/create') }}"><button class="btn-primary btn-sm"><i class="fa fa-plus"></i>Add Sitesetting</button></a> 
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
              <th>Address</th>
              <th>Phone</th>
              <th>Global_certification</th>
              <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sitesettings as $sitesetting)
                <tr data-widget="expandable-table" aria-expanded="false">
                  <td>{{ $sitesetting->address ?? '' }}</td>
                  <td>{{ $sitesetting->phone ?? '' }}</td>
                  <td>{{ $sitesetting->global_certification ?? '' }}</td>
                  <td>{{ $sitesetting->email ?? '' }}</td>
            
                   

                    <td>
                      <div style="display: flex; flex-direction:row;">
                        {{-- <a href="/admin/about/edit/{{ $about->id }}"> --}}
                        <button type="button" class="btn-warning button-size" data-bs-toggle="modal"
                            data-bs-target="#edit{{ $sitesetting->id }}">
                            Update
                        </button>
                    </div>
                        {{-- </a>
                        <a href="{{ url('admin/about/delete/'.$about->id) }}">
                        <button type="button" class="btn-block btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal-default" style="width:auto;"
                            onclick="replaceLinkFunction">Delete</button>
                        </a> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
        @foreach ($sitesettings as $sitesetting)
            <div class="modal fade" id="edit{{ $sitesetting->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                            <a href="{{ url('admin/sitesetting/edit/' . $sitesetting->id) }}">
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
