@extends('portal.layouts.master')
@section('content')


<section class="container-fluid bg-light py-5">
    <div class="container shadow p-4 rounded bg-white d-flex flex-column justify-items-center align-items-center">
       
        <!-- Success and Error Alerts -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-x-circle-fill"></i> {{ session('error') }}
            </div>
        @endif
        
        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1 class="my-4 text-center text-primary " style="text-decorations:underline;"> Application For {{ $demand->vacancy_name }}</h1>
       
        <form id="applicationForm" action="{{ route('admin.applications.store', ['id' => $demand->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row gap-4 d-flex justify-content-center align-items-center">

                <!-- Full Name Field -->
                <div class="mb-3 col-md-5">
                    <label for="name" class="form-label">Full Name <span style="color:red;">*</span></label>
                    <input type="text" class="form-control rounded @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email Address Field -->
                <div class="mb-3 col-md-5">
                    <label for="email" class="form-label">Email Address <span style="color:red;">*</span></label>
                    <input type="email" class="form-control rounded @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Address Field -->
                <div class="mb-3 col-md-5">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control rounded @error('address') is-invalid @enderror" id="address" name="address">
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Phone Number Field -->
                <div class="mb-3 col-md-5">
                    <label for="phone_number" class="form-label">Phone Number <span style="color:red;">*</span></label>
                    <input type="tel" class="form-control rounded @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
                    @error('phone_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Citizenship Front Image Field -->
                <div class="mb-3 col-md-5">
                    <label for="citizenship_front_image" class="form-label">Citizenship Front Image <span style="color:red;">*</span></label>
                    <small class="text-muted d-block">Accepted formats: JPG, PNG, GIF | Maximum size: 2MB</small>
                    <input type="file" class="form-control rounded @error('citizenship_front_image') is-invalid @enderror" id="citizenship_front_image" name="citizenship_front_image" accept="image/*" required>
                    @error('citizenship_front_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Citizenship Back Image Field -->
                <div class="mb-3 col-md-5">
                    <label for="citizenship_back_image" class="form-label">Citizenship Back Image <span style="color:red;">*</span></label>
                    <small class="text-muted d-block">Accepted formats: JPG, PNG, GIF | Maximum size: 2MB</small>
                    <input type="file" class="form-control rounded @error('citizenship_back_image') is-invalid @enderror" id="citizenship_back_image" name="citizenship_back_image" accept="image/*" required>
                    @error('citizenship_back_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- CV PDF Field -->
                <div class="mb-3 col-md-5">
                    <label for="cv_pdf" class="form-label">CV (PDF) <span style="color:red;">*</span></label>
                    <small class="text-muted d-block">Accepted format: PDF only | Maximum size: 5MB</small>
                    <input type="file" class="form-control rounded @error('cv_pdf') is-invalid @enderror" id="cv_pdf" name="cv_pdf" accept=".pdf" required>
                    @error('cv_pdf')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Transcript Field -->
                <div class="mb-3 col-md-5">
                    <label for="transcript" class="form-label">Academic Transcript <span style="color:red;">*</span></label>
                    <small class="text-muted d-block">Maximum size: 2MB</small>
                    <input type="file" class="form-control rounded @error('transcript') is-invalid @enderror" id="transcript" name="transcript" required>
                    @error('transcript')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Engineering License Image Field -->
                <div class="mb-3 col-md-10">
                    <label for="engineering_license_image" class="form-label">Engineering License Image <span style="color:red;">*</span></label>
                    <small class="text-muted d-block">Accepted formats: JPG, PNG, GIF | Maximum size: 2MB</small>
                    <input type="file" class="form-control rounded @error('engineering_license_image') is-invalid @enderror" id="engineering_license_image" name="engineering_license_image" accept="image/*" required>
                    @error('engineering_license_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Work Experience Field -->
                <div class="mb-3 col-md-10">
                    <label for="work_experience" class="form-label">Work Experience</label>
                    <textarea class="form-control rounded @error('work_experience') is-invalid @enderror" id="work_experience" name="work_experience" rows="4">{{ old('work_experience') }}</textarea>
                    @error('work_experience')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Hidden Fields -->
            <div class="d-flex justify-content-between ml-5">
                <input type="hidden" name="vacancy_id" value="{{ $demand->id }}">
                <input type="hidden" name="status" value="pending">
                <button type="submit" class="btn btn-primary btn-lg mt-3 ml-5">Submit Application</button>
            </div>
        </form>
    </div>
</section>
@endsection





