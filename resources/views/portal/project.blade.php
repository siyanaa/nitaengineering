@extends('portal.layouts.master')


@section('content')

<div class="container pt-5">

    <div class="row mb-4">
        <div class="col-lg-5">
            <h2 class="display-4 font-weight-light" style="color:#ffb600">Our Projects</h2>
            <p class="font-italic text-muted">The projects we have carried out</p>
        </div>
    </div>



    <div class="row">
        @foreach ($projects as  $project)
        <div class="col-md-6 py-4">
            <a href="{{ route('render_single_project', $project->slug) }}">
                <div class="card">
                    <img src="{{ asset('uploads/project/image/' . $project->image) }}" class="card-img-top" alt="Waterfall"/>
                    <div class="card-body">
                        <h5 class="card-title ">
                            {{ $project->title }}
                            <a class="ml-4" target="_blank" href="{{ asset('uploads/project/file/' . $project->file) }}"><span class="events_i" style="color: #ffb600"><i class="fa fa-download mr-2"  aria-hidden="true"></i></span>
                            </a>
                        </h5>
                        {{-- <p class="card-text">
                            {!! Str::substr($project->description, 0, 120) !!}
                            <a href="{{ route('render_single_project', $project->slug) }}" style="font-size:14px; color:#ffb600">See More..</a>
                        </p> --}}

                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>


</div>
@endsection
