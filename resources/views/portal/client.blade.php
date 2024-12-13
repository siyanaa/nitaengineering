@extends('portal.layouts.master')


@section('content')
    <div class="container py-5">
        <div class="row mb-4">
            <div class="col-lg-5">
                <h2 class="display-4 font-weight-light" style="color:#ffb600">Our Clients</h2>
                <p class="font-italic text-muted">Take a look at our happy clients</p>
            </div>
        </div>

        <div class="row text-center d-flex align-items-stretch">
            @foreach ($clients as $client)
                <div class="col-md-4 mb-5 mb-md-0 align-items-stretch ml-0">

                    <div class="card testimonial-card">
                        <div class="card-up" style="background-color: #f39c12;"></div>
                        <div class="avatar mx-auto bg-white">
                            <img src="{{ asset('uploads/client/image/' . $client->image) }}"
                                class="rounded-circle img-fluid" />
                        </div>
                        <div class="card-body">
                            <h4 class="mb-4">{{ $client->title }}</h4>
                            <hr />
                        </div>
                    </div>

                </div>
            @endforeach
        </div>


    </div>

    {{-- @foreach ($clients as $client)
<div class="card row row-cols-1 row-cols-md-3 g-4 client-container">
    <div class="col">
        <div class="card h-100">
             <h1>{{ $client->title }}</h1>
            <div class="card-body">
                <img src="{{ asset('uploads/client/image/'. $client->image)  }}" alt="">
               
            </div>
           
        </div>
    </div>
</div>
@endforeach --}}
@endsection
