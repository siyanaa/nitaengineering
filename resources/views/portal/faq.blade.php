@extends('portal.layouts.master')


@section('content')
    <div class='container py-5'>
        <div class="row mb-4">
            <div class="col-lg-5">
                <h2 class="display-4 font-weight-light" style="color:#ffb600">FAQs</h2>
                <p class="font-italic text-muted">Here are some of your questions answered</p>
            </div>
        </div>
    

    
          

       


        <div class="accordion accordion-group" id="construction-accordion">

            <div class="card">
                <div class="card-header p-0 bg-transparent" id="headingOne">
                  <h2 class="mb-0">
                    <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne"
                      aria-expanded="true" aria-controls="collapseOne">
                       {{ $faqs[0]->title }}
                    </button>
                  </h2>
                </div>
    
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                  data-parent="#construction-accordion">
                  <div class="card-body">
                    {!! $faqs[0]->description !!}
                  </div>
                </div>
            </div>


              <div class="card">
                <div class="card-header p-0 bg-transparent" id="headingTwo">
                  <h2 class="mb-0">
                    <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse"
                      data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      {{ $faqs[1]->title }}
                    </button>
                  </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#construction-accordion">
                  <div class="card-body">
                    {!! $faqs[1]->description !!}
                  </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header p-0 bg-transparent" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            {{ $faqs[2]->title }}
                        </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#construction-accordion">
                    <div class="card-body">
                        {!! $faqs[2]->description !!}
                    </div>
                </div>
            </div>

       
                
            
            <div class="card">
                <div class="card-header p-0 bg-transparent" id="headingFour">
                    <h2 class="mb-0">
                        <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            {{ $faqs[3]->title ?? ''}}
                        </button>
                    </h2>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#construction-accordion">
                    <div class="card-body">
                        {!! $faqs[3]->description ?? '' !!}
                    </div>
                </div>
            </div>
            


            <div class="card">
                <div class="card-header p-0 bg-transparent" id="headingFive">
                    <h2 class="mb-0">
                        <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFour">
                            {{ $faqs[4]->title ?? ''}}
                        </button>
                    </h2>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#construction-accordion">
                    <div class="card-body">
                        {!! $faqs[4]->description ?? '' !!}
                    </div>
                </div>
            </div>
           
         
        </div>
     


    </div>
    
@endsection
