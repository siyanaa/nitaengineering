@extends('portal.layouts.master')
@section('content')
<section class="container-fluid">
    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-5">
                <h2 class="display-4 font-weight-light" style="color:#ffb600">Vacancy</h2>
                <p class="font-italic text-muted">We will hear your queries. Message Us!</p>
            </div>
        </div>
        <div class="row gap-1">
            <!-- Loop through vacancies and display them -->
            @foreach($vacancies as $vacancy)
                <div class="col-md-4 my-2">
                    <div class="card col-12">
                        <div class="card-body">
                            <h5 class="card-title">{{ $vacancy->title }}</h5>
                            <p class="card-text">{{strlen($vacancy->content )>20? substr($vacancy->content,0 ,200):$vacancy->content}}</p>
                            <a href="{{ route('vacancy.single', $vacancy->id) }}" class="btn btn-primary">More details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection



