@extends('portal.layouts.master')


@section('content')

<div class="container py-5">
    <div class="row mb-4">
        <div class="col-lg-5">
            <h2 class="display-4 font-weight-light" style="color:#ffb600">News</h2>
            <p class="font-italic text-muted">Some of the news</p>
        </div>
    </div>

    <div class="row mt-3">      
        @foreach ($news as $new ) 
       <div class="col-md-4">
            <iframe src="{{ asset('uploads/news/file/' . $new->file) }}" width="100%" height="300px">
            </iframe>
            <p class="oth_title" style="color:#f39c12;"><span class="events_i"><i class="fa fa-download" aria-hidden="true"></i></span> {{ $new->title }} </p>
           <p class="events_cal"><i class="fa fa-calendar" aria-hidden="true"></i> {{date('F jS,Y', strtotime($new->created_at)) }}</p> 
           <hr>
            {{-- <img class="show_image" src=""> --}}
        </div>
        @endforeach
    </div>
</div>




@endsection