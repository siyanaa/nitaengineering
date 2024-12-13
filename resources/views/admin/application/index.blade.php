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
<div class="row mb-4">
    <div class="col-sm-6">
        <h1 class="m-0">{{ $page_title }}</h1>
    </div>
    <div class="col-sm-6 text-end">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
            <li class="breadcrumb-item active">Applications</li>
        </ol>
    </div>
</div>

<!-- Applications Table -->
<div class="card shadow-sm">
   
    <div class="card-body">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Vacancy</th>
                    <th>Status</th>
                    <th>Documents</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applications as $application)
                <tr>
                    <td>{{ $application->name }}</td>
                    <td>{{ $application->email }}</td>
                    <td>{{ $application->phone_number }}</td>
                    <td>{{ $application->vacancy->vacancy_name }}</td>
                    <td>
                        <span class="badge 
                            {{ $application->status === 'accepted' ? 'bg-success' : 
                               ($application->status === 'rejected' ? 'bg-danger' : 'bg-warning text-dark') }}">
                            {{ ucfirst($application->status) }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="{{ asset($application->citizenship_front_image)}}" target="_blank" class="btn btn-sm btn-outline-primary">Citizenship Front</a>
                            <a href="{{ asset($application->citizenship_back_image) }}" target="_blank" class="btn btn-sm btn-outline-primary">Citizenship Back</a>
                            <a href="{{ asset($application->cv_pdf) }}" target="_blank" class="btn btn-sm btn-outline-primary">CV</a>
                            <a href="{{ asset($application->transcript) }}" target="_blank" class="btn btn-sm btn-outline-primary">Transcript</a>
                            <a href="{{ asset($application->engineering_license_image) }}" target="_blank" class="btn btn-sm btn-outline-primary">Engineering License</a>
                        </div>
                    </td>
                    <td>
                        <div class="btn-group">
                            @if($application->status !== 'accepted')
                            <form action="{{ route('admin.applications.update-status', $application->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="accepted">
                                <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to accept this application?')">
                                    <i class="fas fa-check-circle"></i> Accept
                                </button>
                            </form>
                            @endif

                            @if($application->status !== 'rejected')
                            <form action="{{ route('admin.applications.update-status', $application->id) }}" method="POST" class="ms-1">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="rejected">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to reject this application?')">
                                    <i class="fas fa-times-circle"></i> Reject
                                </button>
                            </form>
                            @endif

                            <button type="button" class="btn btn-warning btn-sm ms-1" data-bs-toggle="modal" data-bs-target="#delete{{ $application->id }}">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Delete Modals -->
@foreach ($applications as $application)
<div class="modal fade" id="delete{{ $application->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this application of <b>{{ $application->name }}</b>? This action cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('admin.applications.destroy', $application->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@stop
