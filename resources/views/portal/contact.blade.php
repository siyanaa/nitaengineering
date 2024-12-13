@extends('portal.layouts.master')


@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-lg-5">
            <h2 class="display-4 font-weight-light" style="color:#ffb600">Contact Us</h2>
            <p class="font-italic text-muted">We will hear your queries. Message Us!</p>
        </div>
    </div>
    <div class="container contact-form">
        <form id="quick_contact" method="post" action="{{ route('admin.contact.newstore') }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Your Name *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Your Email *"
                            value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" class="form-control" placeholder="Your Phone Number *"
                            value="" />
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                    </div>


                    <button type="submit" class="btn-style-one btnContact" id="submit-button" value="Send Message">Submit</button>

                    {{-- <div class="form-group">
                        <input type="submit" name="btnSubmit" class="btnContact" value="Send Message" />
                    </div> --}}


                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <textarea name="message" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    document.getElementById('quick_contact').addEventListener('submit', function(event) {
        event.preventDefault();
        grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', { action: 'submit' }).then(function(token) {
        document.getElementById('g-recaptcha-response').value = token;
        document.getElementById('quick_contact').submit();
});
});
</script>


@endsection


