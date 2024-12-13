@extends('admin.layouts.master')

@section('content')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Edit Vacancy</h1>
        <a href="{{ route('admin.vacancies.index') }}">
            <button class="btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</button>
        </a>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
            <li class="breadcrumb-item active">Edit Vacancy</li>
        </ol>
    </div>
</div>

<form id="quickForm" method="POST" action="{{ route('admin.vacancies.update', $vacancy->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- Method spoofing for PUT -->

    <div class="card-body">
        <div class="form-group">
            <label for="title">Vacancy Title</label>
            <input type="text" name="title" class="form-control" value="{{ $vacancy->title }}" placeholder="Enter Vacancy Title" required>
        </div>

        <div class="form-group">
            <label for="from_date">From Date</label>
            <input type="date" name="from_date" class="form-control" value="{{ $vacancy->from_date }}" required>
        </div>

        <div class="form-group">
            <label for="to_date">To Date</label>
            <input type="date" name="to_date" class="form-control" value="{{ $vacancy->to_date }}" required>
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control" placeholder="Enter content for the vacancy" required>{{ $vacancy->content }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Vacancy Image</label>
            <input type="file" name="image" class="form-control" onchange="previewImage(event)">
            <small>Leave empty to keep the current image.</small>
        </div>
        @if ($vacancy->image)
            <img id="preview" src="{{ asset('storage/' . $vacancy->image) }}" style="max-width: 500px; max-height:500px" />
        @else
            <img id="preview" style="max-width: 500px; max-height:500px" />
        @endif

        <div class="form-group">
            <label for="vacancy_name">Vacancy Name</label>
            <input type="text" name="vacancy_name" class="form-control" value="{{ $vacancy->vacancy_name }}" placeholder="Enter Vacancy Name" required>
        </div>

        <div class="form-group">
            <label for="number_of_people_required">Number of People Required</label>
            <input type="number" name="number_of_people_required" class="form-control" value="{{ $vacancy->number_of_people_required }}" placeholder="Enter number of people required" min="1">
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn-primary">Update Vacancy</button>
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
