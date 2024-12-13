@extends('admin.layouts.master')

@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Create Vacancy</h1>
            <a href="{{ url('admin/vacancies') }}">
                <button class="btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</button>
            </a>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                <li class="breadcrumb-item active">Create Vacancy</li>
            </ol>
        </div>
    </div>

    <form id="quickForm" method="POST" action="{{ route('admin.vacancies.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="title">Vacancy Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter Vacancy Title" required>
            </div>

            <div class="form-group">
                <label for="from_date">From Date</label>
                <input type="date" name="from_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="to_date">To Date</label>
                <input type="date" name="to_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control" placeholder="Enter content for the vacancy" required>{{ old('content') }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Vacancy Image</label>
                <input type="file" name="image" class="form-control" onchange="previewImage(event)" required>
            </div>
            <img id="preview" style="max-width: 500px; max-height:500px" />

            <div class="form-group">
                <label for="vacancy_name">Vacancy Name</label>
                <input type="text" name="vacancy_name" class="form-control" placeholder="Enter Vacancy Name" required>
            </div>

            <div class="form-group">
                <label for="number_of_people_required">Number of People Required</label>
                <input type="number" name="number_of_people_required" class="form-control" placeholder="Enter number of people required" min="1">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn-primary">Create Vacancy</button>
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
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('from_date').setAttribute('min', today);
        document.getElementById('to_date').setAttribute('min', today);
        document.getElementById('from_date').addEventListener('change', function () {
            const fromDate = this.value;
            document.getElementById('to_date').setAttribute('min', fromDate);
        });
    </script>

@stop
