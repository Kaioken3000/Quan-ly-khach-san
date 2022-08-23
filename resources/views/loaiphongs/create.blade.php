<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="/adminresource/assets/"
  data-template="vertical-menu-template-free"
>
<!-- Head -->
@include('layouts.head')

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        @include('layouts.menu')

        <!-- Layout container -->
        <div class="layout-page">

          @include('layouts.navbar')

          <!-- Content wrapper -->
          <div class="content-wrapper">

            <!-- Content -->
            @include('layouts.loaiphong.create')
            <!-- Content -->

          </div>
          
          <!-- Footer -->
          @include('layouts.footer')            

        </div>
      </div>
    </div>
    
    <!-- Script -->
    @include('layouts.script')
  </body>
</html>