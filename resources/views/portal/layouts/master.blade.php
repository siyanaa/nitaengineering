<!DOCTYPE html>
<html lang="en">
@include('portal.includes.head')
<body>
  <div class="body-inner">

    @include('portal.includes.topbar')

    <!--/ Topbar end -->

    @include('portal.includes.navbar')

    @yield('content')

  @include('portal.includes.footer')


  @include('portal.includes.script')

  </div><!-- Body inner end -->
  </body>

  </html>