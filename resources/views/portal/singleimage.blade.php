@extends('portal.layouts.master')


@section('content')
<div class="container py-5">
    <div class="row mb-12">
        <div class="col-lg-12">
            <h2 class="display-5 font-weight-light" style="color:#ffb600">{{ $gallery->title }}</h2>
        </div>
    </div>

    <div class="single-service-container">
        <div class="row ">

            <div class="col-md-offset-1 col-sm-12 col-md-12 col-md-10 ">


                <div class="services-list">

                    {{-- <div class="row ">
                        <div class="col-sm-6 col-md-8 col-md-8 ">
                            <div class="service-block " style="visibility: visible;">
                                <div class="text-block">
                                    @foreach ($gallery->image as $imgUrl)
                                    <div class="col-md-3 mb-4">
                                        <a href="{{ asset($imgUrl) }}" data-lightbox="image-gallery">
                                            <img src="{{ asset($imgUrl) }}" class="gallery_image">
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="row mt-3">
                        @if($gallery->image && is_array($gallery->image))
                        @foreach ($gallery->image as $imgUrl)
                        <div class="col-md-3 mb-4">
                            <a href="{{ asset($imgUrl) }}" data-lightbox="image-gallery">
                                <img src="{{ asset($imgUrl) }}" class="gallery_image">
                            </a>
                        </div>
                        @endforeach
                        @endif


                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection
