@extends('portal.layouts.master')

@section('content')
    <div class="container py-5">
        <div class="row mb-4">
            <div class="col-lg-5">
                <h2 class="display-4 font-weight-light" style="color:#ffb600">Videos</h2>
                <p class="font-italic text-muted">Here are a few videos that you'd want to see</p>
            </div>
        </div>
        <div class="row mt-3">

            @foreach ($videos as $video)
                <div class="col-md-4">
                    <div class="card video_card mt-2 mb-2">
                        <iframe src="{{ $video->vid_url }}" title="{{ $video->title }}" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                        <div class="card-body">
                            <p>
                                <span class="vid_desc">{!! $video->title !!}</span><br>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
