@include("layouts.header");


  <body>

    <div class="wrapper">
    @include("layouts.sidebar");

      <div class="main-panel">
        @include("layouts.navbar");
        

        @yield("main-section")
      </div>


    </div>


    @include("layouts.scripts");
  
   

    @yield("scripts");


  
  </body>
</html>
