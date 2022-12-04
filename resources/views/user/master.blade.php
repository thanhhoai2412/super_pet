<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Pet</title>
    @include('user.css')

</head>
<body> 
  <!-- Topbar Start -->
  @include('user.layouts.topbar')
  <!-- Topbar End -->
  
  <!-- Navbar Start -->
  @include('user.layouts.navbar')
  <!-- Navbar End -->


    

    @yield('content_user')




    
    <!-- Footer Start -->
    @include('user.layouts.footer')
    <!-- Footer End -->

    
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
   
    @include('user.js')
</body>
</html>