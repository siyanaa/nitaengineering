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
    <a href="{{ url('admin') }}"><button class="btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</button></a>

    <a href="{{ url('admin/faq/create') }}"><button class="btn-primary btn-sm"><i class="fa fa-plus"></i> Add
        FAQ</button></a>

  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </div>
</div>


<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Title</th>
      <th>Description</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($faq as $fa)
    <td>{{ $fa->title }}</td>
    <td>{!! $fa->description !!}</td>
    <div style="display: flex; flex-direction:row;">
      <td>
        <button type="button" class="btn-warning button-size" data-bs-toggle="modal" data-bs-target="#edit{{ $fa->id }}">
          Update
        </button>
    </div>

    <div style="display: flex; flex-direction:row;">

      <button type="button" class="btn-danger button-size" data-bs-toggle="modal" data-bs-target="#delete{{ $fa->id }}">
        Delete
      </button>
    </div>

    </td>
    </tr>
    @endforeach
  </tbody>

  @foreach ($faq as $fa )
  <div class="modal fade" id="delete{{ $fa->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
          <a href="{{ url('admin/faq/destroy/'.$fa->id) }}">
            <button type="button" class="btn btn-danger">Yes
            </button>
          </a>
        </div>
      </div>
    </div>
  </div>

  @endforeach

  @foreach ($faq as $fa )
  <div class="modal fade" id="edit{{ $fa->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
          <a href="{{ url('admin/faq/edit/'.$fa->id) }}">
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