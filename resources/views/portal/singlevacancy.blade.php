@extends('portal.layouts.master')
@section('content')




<style>
    /* Custom Styles */
    .imgcontroller {
        width: 100%;
        height: 40vh;
        object-fit: cover;
        border-radius: 20px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }




    .paddingbox {
        border: 1px solid #ddd;
        padding: 15px;
        border-radius: 8px;
        background-color: #f9f9f9;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }




    .sm-text {
        font-size: 16px !important;
        color: #6c757d;
    }




    .md-text {
        font-size: 18px;
        font-weight: bold;
        color: #343a40;
    }




    .customiconssmall {
        font-size: 14px;
        color: #6c757d;
    }




    .sidebar-title {
        font-size: 20px;
        font-weight: bold;
        color: #343a40;
        margin-bottom: 15px;
    }




    .sidebar-item {
        padding: 10px 0;
    }




    .sidebar-item a {
        color: #343a40;
        text-decoration: none;
        font-size: 18px;
    }




    .sidebar-item a:hover {
        text-decoration: underline;
    }
</style>




<section class="container-fluid pt-4">
    <div class="container">
        <div class="row gap-4">
            <!-- Main Content Column -->
            <div class="col-md-8">
                <div class="row d-flex flex-column">
                    <div class="col-md-12 mb-3 pr-5">
                        <!-- Job Image -->
                        <img class="imgcontroller" src="{{ asset('storage/' . $vacancies->image) }}" alt="{{ $vacancies->title }}">




                        <!-- Job Information Section -->
                        <div class="d-flex flex-wrap justify-content-between py-3">
                            <div class="d-flex">
                                <i class="fa-solid fa-calendar-days customiconssmall pt-1 mx-1"></i>
                                <h6 class="sm-text">Date:</h6>
                                <h6 class="pl-2">{{ $vacancies->from_date}}</h6>
                            </div>
                            <div class="d-flex">
                                <i class="fa-solid fa-briefcase customiconssmall pt-1 mx-1"></i>
                                <h6 class="sm-text incometext">Position:</h6>
                                <h6 class="pl-2">{{ $vacancies->vacancy_name }}</h6>
                            </div>
                            <div class="d-flex">
                                <i class="fa-solid fa-users customiconssmall pt-1 mx-1"></i>
                                <h6 class="sm-text">Vacancy:</h6>
                                <h6 class="pl-2">{{ $vacancies->number_of_people_required }}</h6>
                            </div>
                        </div>

                        <!-- Job Description -->
                        <h5 class="md-text">{{ $vacancies->title }}</h5>
                        <p class="sm-text py-1" id="blog-description">{{ $vacancies->content }}</p>

                        <!-- Apply Button -->
                            <a href="{{ route('create', ['id' => $vacancies->id]) }}" class="btn btn-primary">Apply Now</a>
                    </div>
                </div>
            </div>




           <!-- Sidebar Section -->
            <div class="col-md-4 gap-1 paddingbox rounded">
                <h3 class="sidebar-title ml-4">Recent Vacancies</h3>
                <ul>
                    @forelse($recentVacancies as $recentVacancy)
                        <li class="sidebar-item py-1">
                            <a href="{{ route('vacancy.single', $recentVacancy->id) }}" class="sm-text">
                                {{ $recentVacancy->title }}
                            </a>
                        </li>
                    @empty
                        <li class="sidebar-item py-1">
                            <p class="sm-text">No other vacancies available</p>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
   
</section>
@endsection