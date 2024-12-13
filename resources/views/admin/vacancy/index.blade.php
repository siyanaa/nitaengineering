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
        <h1 class="m-0">{{ $page_title }}</h1>
        <a href="{{ route('admin.vacancies.create') }}">
            <button class="btn-primary btn-sm"><i class="fa fa-plus"></i> Add Vacancy</button>
        </a>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
            <li class="breadcrumb-item active">Vacancies</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->


<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Vacancy Name</th>
            <th>Title</th>
            <th>From Date</th>
            <th>To Date</th>
            <th>Image</th>
            <th>Number of People Required</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($vacancies as $vacancy)
        <tr data-widget="expandable-table" aria-expanded="false">
            <td>{{ $vacancy->vacancy_name ?? '' }}</td>
            <td>{{ $vacancy->title ?? '' }}</td>
            <td>{{ $vacancy->from_date ?? '' }}</td>
            <td>{{ $vacancy->to_date ?? '' }}</td>
            <td>
                <img src="{{ asset($vacancy->image) }}" alt="{{ $vacancy->title }}" style="width: 150px; height:150px;" />
            </td>
            <td>{{ $vacancy->number_of_people_required ?? '' }}</td>
            <td>
                <div style="display: flex; flex-direction:row;">
                    <button type="button" class="btn-warning button-size" data-bs-toggle="modal"
                        data-bs-target="#edit{{ $vacancy->id }}">
                        Update
                    </button>
                </div>


                <div style="display: flex; flex-direction:row;">
                    <button type="button" class="btn-danger button-size" data-bs-toggle="modal"
                        data-bs-target="#delete{{ $vacancy->id }}">
                        Delete
                    </button>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


<!-- Edit Modals -->
@foreach ($vacancies as $vacancy)
<div class="modal fade" id="edit{{ $vacancy->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to update?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                <a href="{{ route('admin.vacancies.edit', $vacancy->id) }}">


                    <button type="button" class="btn btn-success">Yes</button>
                </a>
            </div>
        </div>
    </div>
</div>
@endforeach


<!-- Delete Modals -->
@foreach ($vacancies as $vacancy)
<div class="modal fade" id="delete{{ $vacancy->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                <form action="{{ route('admin.vacancies.destroy', $vacancy->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-success">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach




<script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')


    myModal.addEventListener('shown.bs.modal', function() {
        myInput.focus()
    })
</script>


@stop



