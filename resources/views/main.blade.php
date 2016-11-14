<!DOCTYPE html>
<html lang="en">
<head>
@include('partials._head')
</head>

  <body>
    @include('partials._nav')
         


    <div class="container">
      @include('partials._messages')
     <!--  You insert content that is different on different pages into this area -->
      @yield('content')

      @include('partials._footer')
      
      </div> <!-- End of .container -->      

    @include('partials._javascript')
    @yield('scripts')
  </body>
</html>