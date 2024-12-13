@extends('portal.layouts.master')


@section('content')
    <div class="container py-5">
        <div class="row mb-4">
            <div class="col-lg-5">
                <h2 class="display-4 font-weight-light" style="color:#ffb600">Search Results</h2>
                {{-- <p class="font-italic text-muted">Below are the services we provide</p> --}}
            </div>
        </div>

        @foreach ($searchServices as $searchService)
            <div class="row ">

                <div class="col-md-offset-1 col-sm-12 col-md-12 col-md-10 ">

                    <div class="services-list ">

                        <div class="row ">
                            <div class="col-sm-6 col-md-8 col-md-8 ">

                                <div class="service-block " style="visibility: visible;">
                                    <div class="ico fa fa-magic highlight"></div>
                                    <div class="text-block">
                                        <div class="name">{{ $searchService->title }}</div>
                                        <img class="mt-3 service-img" src="{{$searchService->image}}"
                                            style="" alt="">
                                        <div class="text mt-5">{!! $searchService->description !!}</div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            </div>
        @endforeach

        {{-- for projects --}}

        @foreach ($projects as $project)
        <div class="row ">

            <div class="col-md-offset-1 col-sm-12 col-md-12 col-md-10 ">

                <div class="services-list ">

                    <div class="row ">
                        <div class="col-sm-6 col-md-8 col-md-8 ">

                            <div class="service-block " style="visibility: visible;">
                                <div class="ico fa fa-magic highlight"></div>
                                <div class="text-block">
                                    <div class="name">{{ $project->title }}</div>
                                    <img class="mt-3 service-img" src="{{$project->image}}"
                                        style="" alt="">
                                    <div class="text mt-5">{!! $project->description !!}</div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>
    @endforeach

    {{-- for news --}}

    @foreach ($news as $new)
    <div class="row ">

        <div class="col-md-offset-1 col-sm-12 col-md-12 col-md-10 ">

            <div class="services-list ">

                <div class="row ">
                    <div class="col-sm-6 col-md-8 col-md-8 ">

                        <div class="service-block " style="visibility: visible;">
                            <div class="ico fa fa-magic highlight"></div>
                            <div class="text-block">
                                <div class="name">{{ $new->title }}</div>
                                <img class="mt-3 service-img" src="{{$new->image}}"
                                    style="" alt="">
                                <div class="text mt-5">{!! $new->description !!}</div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>
@endforeach
    </div>



    {{-- @foreach ($services as $service)
<div class="card row row-cols-1 row-cols-md-3 g-4 service-container">
    <div class="col">
        <div class="card h-100">
            <h1>{{ $service->title }}</h1>
            <div class="card-body">
                <img src="{{ asset('uploads/service/'. $service->image)  }}" alt="">
                <p>{{ $service->description }}</p>
            </div>
        </div>
    </div>
</div>
@endforeach --}}
@endsection
