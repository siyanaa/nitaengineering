@extends('portal.layouts.master')


@section('content')

<div class="container flex-wrap d-md-flex pricing-container">



    @foreach ($pricing as $price )


    <div class="card" style="width: 25rem;">
        <img src="{{ asset('uploads/pricing/image/' . $price->image ?? '') }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $price->title }}</h5>
            <p class="card-text">{!! $price->description !!}</p>
        </div>
        <div class="card-body">
            <iframe src="{{ asset('uploads/pricing/file/' . $price->file) }}" width="100%" height="300px">
            </iframe>
        </div>
    </div>
        
    @endforeach
</div>

    {{-- <div class="container">

    <div class="row mt-3">


        @foreach ($pricing as $price)
        <div class="col-md-4">

@foreach($pricing as $price)
<div class=" row row-cols-1 row-cols-md-3 g-4 pricing-container">
    <div class="col">
        <div class="card h-100">
            <h1>{{ $price->title }}</h1>
            
            <div class="card-body">
                <img src="{{ asset('uploads/pricing/image/' . $price->image ?? '') }}" width="100%" height="50%" />

                <iframe src="{{ asset('uploads/pricing/file/' . $price->file) }}" width="100%" height="300px">
                </iframe>
             
            </div>
        </div>
    </div>
  

</div> --}}
@endsection
