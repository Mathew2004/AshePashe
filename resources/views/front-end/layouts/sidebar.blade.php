<div class="sidebar  has-scrollbar" data-mobile-menu>


<div class="sidebar-category">

  <div class="sidebar-top">
    <h2 class="sidebar-title">{{$store->name}}</h2>

    <button class="sidebar-close-btn" data-mobile-menu-close-btn>
      <ion-icon name="close-outline"></ion-icon>
    </button>
  </div>

  <ul class="sidebar-menu-category-list">

    <li class="sidebar-menu-category text-center">

      <p>
        {!!$store->description!!}
      </p>
    </li><br>
    <li class="sidebar-menu-category text-center">
      <div class="sidebar-accordion-menu">

        <div class="menu-title-flex">
          <img src="/front-end-assets/images/icons/location.png" alt="clothes" width="20" height="20"
            class="menu-title-img">

          <p class="menu-title">{{$store->division}}</p>
        </div>

      </div>

    </li>
    <li class="sidebar-menu-category text-center">
      <div class="sidebar-accordion-menu">

        <div class="menu-title-flex">
          <img src="/front-end-assets/images/icons/google-maps.png" alt="clothes" width="20" height="20"
            class="menu-title-img">

          <p class="menu-title">{{$store->city}}</p>
        </div>

      </div>

    </li>
    <li class="sidebar-menu-category text-center">
      <div class="sidebar-accordion-menu">

        <div class="menu-title-flex">
          <img src="/front-end-assets/images/icons/phone-call.png" alt="clothes" width="20" height="20"
            class="menu-title-img">

          <p class="menu-title">{{$store->phone}}</p>
        </div>

      </div>

    </li>
    <li class="sidebar-menu-category text-center">
      <div class="sidebar-accordion-menu">

        <div class="menu-title-flex">
          <img src="/front-end-assets/images/icons/location.png" alt="clothes" width="20" height="20"
            class="menu-title-img">

          <p class="menu-title">{{$store->map}}</p>
        </div>

      </div>

    </li>
    <li class="sidebar-menu-category text-center">
     <style>
      iframe{
        width: 100%;
        height: auto;
      }
     </style>
      {!!$store->iframe!!}
    </li>

  
 





  </ul>

</div>
</div>

<!-- <div class="sidebar  has-scrollbar" data-mobile-menu>

    <div class="sidebar-category">

        <div class="sidebar-top">
            <h2 class="sidebar-title">Category</h2>

            <button class="sidebar-close-btn" data-mobile-menu-close-btn>
                <ion-icon name="close-outline"></ion-icon>
            </button>
        </div>

        <ul class="sidebar-menu-category-list">

            <li class="sidebar-menu-category">

                <button class="sidebar-accordion-menu" data-accordion-btn>

                    <div class="menu-title-flex">
                        <img src="/front-end-assets/images/icons/dress.svg" alt="clothes" width="20" height="20"
                            class="menu-title-img">

                        <p class="menu-title">Clothes</p>
                    </div>

                    <div>
                        <ion-icon name="add-outline" class="add-icon"></ion-icon>
                        <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                    </div>

                </button>

                <ul class="sidebar-submenu-category-list" data-accordion>

                    <li class="sidebar-submenu-category">
                        <a href="#" class="sidebar-submenu-title">
                            <p class="product-name">Shirt</p>
                            <data value="300" class="stock" title="Available Stock">300</data>
                        </a>
                    </li>

                    <li class="sidebar-submenu-category">
                        <a href="#" class="sidebar-submenu-title">
                            <p class="product-name">shorts & jeans</p>
                            <data value="60" class="stock" title="Available Stock">60</data>
                        </a>
                    </li>

                    <li class="sidebar-submenu-category">
                        <a href="#" class="sidebar-submenu-title">
                            <p class="product-name">jacket</p>
                            <data value="50" class="stock" title="Available Stock">50</data>
                        </a>
                    </li>

                    <li class="sidebar-submenu-category">
                        <a href="#" class="sidebar-submenu-title">
                            <p class="product-name">dress & frock</p>
                            <data value="87" class="stock" title="Available Stock">87</data>
                        </a>
                    </li>

                </ul>

            </li>



        </ul>

    </div>


</div> -->


