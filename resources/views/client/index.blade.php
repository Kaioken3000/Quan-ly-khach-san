<!DOCTYPE HTML>
<html>
@include('client.layouts.head')
<body>
  
  @include('client.layouts.header')
  <!-- END head -->
  
  
    @include('client.layouts.session')
    <!-- END section -->
    
    <!-- Book -->
    @include('client.layouts.book')
    
    <!-- Welcome -->
    @include('client.layouts.welcome')
    
    <!-- Room -->
    @include('client.layouts.room')
    
    <!-- Photo -->
    @include('client.layouts.photo')
    
    <!-- END section -->
    
    <!-- Restaurant -->
    @include('client.layouts.restaurant')
    
    <!-- END section -->
    <!-- Pepple -->
    @include('client.layouts.people')
    
    
    <!-- Event -->
    <!-- @include('client.layouts.event') -->
    
    <!-- Reserve -->
    @include('client.layouts.reserve')
    
    
    <!-- Footer -->
    @include('client.layouts.footer')
    
    <!-- Script -->
    @include('client.layouts.script')

  </body>
</html>