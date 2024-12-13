@extends('portal.layouts.master')


@section('content')

<div class="container py-5">
    <div class="row mb-4">
        <div class="col-lg-5">
            <h2 class="display-4 font-weight-light" style="color:#ffb600">Legal Documents</h2>
            <p class="font-italic text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
    </div>

    <div class="row mt-3">      
        @foreach ($legaldocuments as $docs ) 
       <div class="col-md-4">
            <iframe src="{{ asset('uploads/legaldocument/file/' . $docs->file) }}" width="100%" height="300px">
            </iframe>
            <p class="oth_title" style="color:#f39c12;"><span class="events_i"><i class="fa fa-download" aria-hidden="true"></i></span> {{ $docs->title }} </p>
           <p class="events_cal"><i class="fa fa-calendar" aria-hidden="true"></i> {{date('F jS,Y', strtotime($docs->created_at)) }}</p> 
           <hr>
            {{-- <img class="show_image" src=""> --}}
        </div>
        @endforeach
    </div>
</div>


@endsection