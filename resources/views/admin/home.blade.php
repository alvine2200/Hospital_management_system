<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css');
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      
      @include('admin.sidebar');

      @include('admin.navbar');
      
      @include('admin.body');
        
      @include('admin.script');
  </body>
</html>
