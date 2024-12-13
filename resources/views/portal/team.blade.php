@extends('portal.layouts.master')


@section('content')
    <div class="container py-5">
        <div class="row mb-4">
            <div class="col-lg-5">
                <h2 class="display-4 font-weight-light" style="color:#ffb600">Our team</h2>
                {{-- <p class="font-italic text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> --}}
            </div>
        </div>




        <div class="row text-center">
            <!-- Team item-->
            @foreach ($teams as $team )
            <div class="col-xl-3 col-sm-6 mb-5 team-card-container">
                <div class="bg-white rounded shadow-sm py-5 px-4">
                    {{-- <img
                        src="{{ asset('uploads/team/' . $team->image) }}" alt="" width="100"
                        class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                    <h5 class="mb-0">{{ $team->name }}</h5>
                    <span class="small text-uppercase text-muted">{{$team->position}}</span> --}}

                    <img src="{{ asset('uploads/team/' . $team->image) }}" alt="" width="150" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                    <h5 class="mb-0 team-member-name">{{ $team->name }}</h5>
                    <span class="small text-uppercase text-muted">{{ $team->position }}</span>

                    <ul class="social mb-0 list-inline mt-3">
                        <li class="list-inline-item">
                            <a href="#" class="social-link">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="social-link">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="social-link">
                                <i class="fa fa-envelope"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>


    {{-- @foreach ($teams as $team)

<div class="card row row-cols-1 row-cols-md-3 g-4 team-container">
    <div class="col">
        <div class="card h-100">
            <img src="{{ asset('uploads/team/' . $team->image) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $team->name }}</h5>
                <p class="card-text">{{ $team->email }}</p>
                <p class="card-text">{{ $team->contact_number }}</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">{{ $team->position }}</small>
            </div>
        </div>
    </div>
</div>

@endforeach --}}


@endsection

