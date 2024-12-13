<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>Nita Engineering</title>

    <!-- Mobile Specific Metas -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Constra HTML Template v1.0">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('css/images/favicon.png') }}">

    <!-- CSS -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Animation -->
    <link rel="stylesheet" href="{{ asset('css/plugins/animate-css/animate.css') }}">
    <!-- slick Carousel -->
    <link rel="stylesheet" href="{{ asset('css/plugins/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/slick/slick-theme.css') }}">
    <!-- Colorbox -->
    <link rel="stylesheet" href="{{ asset('css/plugins/colorbox/colorbox.css') }}">
    <!-- Lightbox -->
    <link rel="stylesheet" href="{{ asset('dist/css/lightbox.css') }}">

    <!-- Google reCAPTCHA -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>

    {!!htmlScriptTagJsApi([
        'callback_then' => 'callbackThen',
        'callback_catch' => 'callbackCatch'
    ]) !!}


    {{-- <script>
      document.addEventListener('DOMContentLoaded', function () {
        var contactForm = document.getElementById('quick_contact');

        if (contactForm) {
          contactForm.addEventListener('submit', function (event) {
            event.preventDefault();
            grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', { action: 'submit' }).then(function(token) {
              document.getElementById('g-recaptcha-response').value = token;
              document.getElementById('quick_contact').submit();
            });
          });
        } else {
          console.error("Element with ID 'quick_contact' not found.");
        }
      });
    </script> --}}

    <!-- Other scripts and callbacks as needed -->

    <!-- Template styles -->
    <link rel="stylesheet" href="{{ asset('css/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

       {{-- For Contact Form Recaptcha --}}
       <meta name="csrf-token" content="{{ csrf_token() }}">

  </head>
