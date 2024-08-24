@extends("front-end.layouts.main")

@push('title')
{{$offer_product->name}} - Offer 
@endpush

<!--
    - MAIN
  -->

@section("main-section")




<!--
      - PRODUCT
    -->

<div class="product-container">

    <div class="container">


        <!--
          - SIDEBAR
        -->

        <div class="sidebar  has-scrollbar" data-mobile-menu>

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

                    <li class="sidebar-menu-category">

                        <button class="sidebar-accordion-menu" data-accordion-btn>

                            <div class="menu-title-flex">
                                <img src="/front-end-assets/images/icons/shoes.svg" alt="footwear"
                                    class="menu-title-img" width="20" height="20">

                                <p class="menu-title">Footwear</p>
                            </div>

                            <div>
                                <ion-icon name="add-outline" class="add-icon"></ion-icon>
                                <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                            </div>

                        </button>

                        <ul class="sidebar-submenu-category-list" data-accordion>

                            <li class="sidebar-submenu-category">
                                <a href="#" class="sidebar-submenu-title">
                                    <p class="product-name">Sports</p>
                                    <data value="45" class="stock" title="Available Stock">45</data>
                                </a>
                            </li>

                            <li class="sidebar-submenu-category">
                                <a href="#" class="sidebar-submenu-title">
                                    <p class="product-name">Formal</p>
                                    <data value="75" class="stock" title="Available Stock">75</data>
                                </a>
                            </li>

                            <li class="sidebar-submenu-category">
                                <a href="#" class="sidebar-submenu-title">
                                    <p class="product-name">Casual</p>
                                    <data value="35" class="stock" title="Available Stock">35</data>
                                </a>
                            </li>

                            <li class="sidebar-submenu-category">
                                <a href="#" class="sidebar-submenu-title">
                                    <p class="product-name">Safety Shoes</p>
                                    <data value="26" class="stock" title="Available Stock">26</data>
                                </a>
                            </li>

                        </ul>

                    </li>

                    <li class="sidebar-menu-category">

                        <button class="sidebar-accordion-menu" data-accordion-btn>

                            <div class="menu-title-flex">
                                <img src="/front-end-assets/images/icons/jewelry.svg" alt="clothes"
                                    class="menu-title-img" width="20" height="20">

                                <p class="menu-title">Jewelry</p>
                            </div>

                            <div>
                                <ion-icon name="add-outline" class="add-icon"></ion-icon>
                                <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                            </div>

                        </button>

                        <ul class="sidebar-submenu-category-list" data-accordion>

                            <li class="sidebar-submenu-category">
                                <a href="#" class="sidebar-submenu-title">
                                    <p class="product-name">Earrings</p>
                                    <data value="46" class="stock" title="Available Stock">46</data>
                                </a>
                            </li>

                            <li class="sidebar-submenu-category">
                                <a href="#" class="sidebar-submenu-title">
                                    <p class="product-name">Couple Rings</p>
                                    <data value="73" class="stock" title="Available Stock">73</data>
                                </a>
                            </li>

                            <li class="sidebar-submenu-category">
                                <a href="#" class="sidebar-submenu-title">
                                    <p class="product-name">Necklace</p>
                                    <data value="61" class="stock" title="Available Stock">61</data>
                                </a>
                            </li>

                        </ul>

                    </li>

                    <li class="sidebar-menu-category">

                        <button class="sidebar-accordion-menu" data-accordion-btn>

                            <div class="menu-title-flex">
                                <img src="/front-end-assets/images/icons/perfume.svg" alt="perfume"
                                    class="menu-title-img" width="20" height="20">

                                <p class="menu-title">Perfume</p>
                            </div>

                            <div>
                                <ion-icon name="add-outline" class="add-icon"></ion-icon>
                                <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                            </div>

                        </button>

                        <ul class="sidebar-submenu-category-list" data-accordion>

                            <li class="sidebar-submenu-category">
                                <a href="#" class="sidebar-submenu-title">
                                    <p class="product-name">Clothes Perfume</p>
                                    <data value="12" class="stock" title="Available Stock">12 pcs</data>
                                </a>
                            </li>

                            <li class="sidebar-submenu-category">
                                <a href="#" class="sidebar-submenu-title">
                                    <p class="product-name">Deodorant</p>
                                    <data value="60" class="stock" title="Available Stock">60 pcs</data>
                                </a>
                            </li>

                            <li class="sidebar-submenu-category">
                                <a href="#" class="sidebar-submenu-title">
                                    <p class="product-name">jacket</p>
                                    <data value="50" class="stock" title="Available Stock">50 pcs</data>
                                </a>
                            </li>

                            <li class="sidebar-submenu-category">
                                <a href="#" class="sidebar-submenu-title">
                                    <p class="product-name">dress & frock</p>
                                    <data value="87" class="stock" title="Available Stock">87 pcs</data>
                                </a>
                            </li>

                        </ul>

                    </li>

                    <li class="sidebar-menu-category">

                        <button class="sidebar-accordion-menu" data-accordion-btn>

                            <div class="menu-title-flex">
                                <img src="/front-end-assets/images/icons/cosmetics.svg" alt="cosmetics"
                                    class="menu-title-img" width="20" height="20">

                                <p class="menu-title">Cosmetics</p>
                            </div>

                            <div>
                                <ion-icon name="add-outline" class="add-icon"></ion-icon>
                                <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                            </div>

                        </button>

                        <ul class="sidebar-submenu-category-list" data-accordion>

                            <li class="sidebar-submenu-category">
                                <a href="#" class="sidebar-submenu-title">
                                    <p class="product-name">Shampoo</p>
                                    <data value="68" class="stock" title="Available Stock">68</data>
                                </a>
                            </li>

                            <li class="sidebar-submenu-category">
                                <a href="#" class="sidebar-submenu-title">
                                    <p class="product-name">Sunscreen</p>
                                    <data value="46" class="stock" title="Available Stock">46</data>
                                </a>
                            </li>

                            <li class="sidebar-submenu-category">
                                <a href="#" class="sidebar-submenu-title">
                                    <p class="product-name">Body Wash</p>
                                    <data value="79" class="stock" title="Available Stock">79</data>
                                </a>
                            </li>

                            <li class="sidebar-submenu-category">
                                <a href="#" class="sidebar-submenu-title">
                                    <p class="product-name">Makeup Kit</p>
                                    <data value="23" class="stock" title="Available Stock">23</data>
                                </a>
                            </li>

                        </ul>

                    </li>

                    <li class="sidebar-menu-category">

                        <button class="sidebar-accordion-menu" data-accordion-btn>

                            <div class="menu-title-flex">
                                <img src="/front-end-assets/images/icons/glasses.svg" alt="glasses"
                                    class="menu-title-img" width="20" height="20">

                                <p class="menu-title">Glasses</p>
                            </div>

                            <div>
                                <ion-icon name="add-outline" class="add-icon"></ion-icon>
                                <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                            </div>

                        </button>

                        <ul class="sidebar-submenu-category-list" data-accordion>

                            <li class="sidebar-submenu-category">
                                <a href="#" class="sidebar-submenu-title">
                                    <p class="product-name">Sunglasses</p>
                                    <data value="50" class="stock" title="Available Stock">50</data>
                                </a>
                            </li>

                            <li class="sidebar-submenu-category">
                                <a href="#" class="sidebar-submenu-title">
                                    <p class="product-name">Lenses</p>
                                    <data value="48" class="stock" title="Available Stock">48</data>
                                </a>
                            </li>

                        </ul>

                    </li>

                    <li class="sidebar-menu-category">

                        <button class="sidebar-accordion-menu" data-accordion-btn>

                            <div class="menu-title-flex">
                                <img src="/front-end-assets/images/icons/bag.svg" alt="bags" class="menu-title-img"
                                    width="20" height="20">

                                <p class="menu-title">Bags</p>
                            </div>

                            <div>
                                <ion-icon name="add-outline" class="add-icon"></ion-icon>
                                <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                            </div>

                        </button>

                        <ul class="sidebar-submenu-category-list" data-accordion>

                            <li class="sidebar-submenu-category">
                                <a href="#" class="sidebar-submenu-title">
                                    <p class="product-name">Shopping Bag</p>
                                    <data value="62" class="stock" title="Available Stock">62</data>
                                </a>
                            </li>

                            <li class="sidebar-submenu-category">
                                <a href="#" class="sidebar-submenu-title">
                                    <p class="product-name">Gym Backpack</p>
                                    <data value="35" class="stock" title="Available Stock">35</data>
                                </a>
                            </li>

                            <li class="sidebar-submenu-category">
                                <a href="#" class="sidebar-submenu-title">
                                    <p class="product-name">Purse</p>
                                    <data value="80" class="stock" title="Available Stock">80</data>
                                </a>
                            </li>

                            <li class="sidebar-submenu-category">
                                <a href="#" class="sidebar-submenu-title">
                                    <p class="product-name">Wallet</p>
                                    <data value="75" class="stock" title="Available Stock">75</data>
                                </a>
                            </li>

                        </ul>

                    </li>

                </ul>

            </div>

            <!-- <div class="product-showcase">

            <h3 class="showcase-heading">best sellers</h3>

            <div class="showcase-wrapper">

              <div class="showcase-container">

                <div class="showcase">

                  <a href="#" class="showcase-img-box">
                    <img src="/front-end-assets/images/products/1.jpg" alt="baby fabric shoes" width="75" height="75"
                      class="showcase-img">
                  </a>

                  <div class="showcase-content">

                    <a href="#">
                      <h4 class="showcase-title">baby fabric shoes</h4>
                    </a>

                    <div class="showcase-rating">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                    </div>

                    <div class="price-box">
                      <del>$5.00</del>
                      <p class="price">$4.00</p>
                    </div>

                  </div>

                </div>

                <div class="showcase">

                  <a href="#" class="showcase-img-box">
                    <img src="/front-end-assets/images/products/2.jpg" alt="men's hoodies t-shirt" class="showcase-img"
                      width="75" height="75">
                  </a>

                  <div class="showcase-content">

                    <a href="#">
                      <h4 class="showcase-title">men's hoodies t-shirt</h4>
                    </a>
                    <div class="showcase-rating">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star-half-outline"></ion-icon>
                    </div>

                    <div class="price-box">
                      <del>$17.00</del>
                      <p class="price">$7.00</p>
                    </div>

                  </div>

                </div>

                <div class="showcase">

                  <a href="#" class="showcase-img-box">
                    <img src="/front-end-assets/images/products/3.jpg" alt="girls t-shirt" class="showcase-img" width="75"
                      height="75">
                  </a>

                  <div class="showcase-content">

                    <a href="#">
                      <h4 class="showcase-title">girls t-shirt</h4>
                    </a>
                    <div class="showcase-rating">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star-half-outline"></ion-icon>
                    </div>

                    <div class="price-box">
                      <del>$5.00</del>
                      <p class="price">$3.00</p>
                    </div>

                  </div>

                </div>

                <div class="showcase">

                  <a href="#" class="showcase-img-box">
                    <img src="/front-end-assets/images/products/4.jpg" alt="woolen hat for men" class="showcase-img" width="75"
                      height="75">
                  </a>

                  <div class="showcase-content">

                    <a href="#">
                      <h4 class="showcase-title">woolen hat for men</h4>
                    </a>
                    <div class="showcase-rating">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                    </div>

                    <div class="price-box">
                      <del>$15.00</del>
                      <p class="price">$12.00</p>
                    </div>

                  </div>

                </div>

              </div>

            </div>

          </div> -->

        </div>



        <div class="product-box">




            <!--
            - PRODUCT FEATURED
          -->

            <div class="product-featured">

                <!-- <h2 class="title">Deal of the day</h2> -->

                <div class="showcase-wrapper has-scrollbar">

                    <div class="showcase-container">

                        <div class="showcase">

                            <div class="showcase-banner">
                                <swiper-container class="mySwiper" pagination="true" pagination-clickable="true"
                                    space-between="30" effect="fade" navigation="true" autoplay="">
                                    <swiper-slide>
                                        <img src="{{url("/uploads/products/" . $offer_product->image1)}}"
                                            class="showcase-img" />
                                    </swiper-slide>
                                    <swiper-slide>
                                        <img src="{{url("/uploads/products/" . $offer_product->image2)}}"
                                            class="showcase-img" />
                                    </swiper-slide>
                                    <swiper-slide>
                                        <img src="{{url("/uploads/products/" . $offer_product->image3)}}"
                                            class="showcase-img" />
                                    </swiper-slide>

                                </swiper-container>
                                <!-- <img src="/front-end-assets/images/products/shampoo.jpg"
                                    alt="shampoo, conditioner & facewash packs" class="showcase-img"> -->
                            </div>

                            <div class="showcase-content">

                                <div class="showcase-rating">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star-outline"></ion-icon>
                                    <ion-icon name="star-outline"></ion-icon>
                                </div>

                                <a href="#">
                                    <h3 class="showcase-title">{{$offer_product->name}}</h3>
                                </a>

                                <p class="showcase-desc">
                                    {!! $offer_product->description !!}
                                </p>

                                <div class="price-box">
                                    <p class="price">Tk. {{$offer_product->offer_price}}</p>

                                    <del>{{$offer_product->price }}</del>
                                </div>

                                <button class="add-cart-btn">add to cart</button>

                                <div class="showcase-status">
                                    <div class="wrapper">
                                        <p>
                                            already sold: <b>20</b>
                                        </p>

                                        <p>
                                            available: <b>40</b>
                                        </p>
                                    </div>

                                    <div class="showcase-status-bar"></div>
                                </div>

                                <div class="countdown-box">
                                    <p class="countdown-desc">Hurry Up! Offer ends in:</p>
                                    <div class="countdown">
                                        <div class="countdown-content">
                                            <p class="display-number" id="countdown-days">
                                                {{$remainingTime['days'] ? $remainingTime['days'] : '00'}}</p>
                                            <p class="display-text">Days</p>
                                        </div>
                                        <div class="countdown-content">
                                            <p class="display-number" id="countdown-hours">
                                                {{$remainingTime['hours'] ? $remainingTime['hours']  : '00'}}</p>
                                            <p class="display-text">Hours</p>
                                        </div>
                                        <div class="countdown-content">
                                            <p class="display-number" id="countdown-minutes">
                                                {{$remainingTime['minutes']  ? $remainingTime['minutes']  : '00'}}</p>
                                            <p class="display-text">Min</p>
                                        </div>
                                        <div class="countdown-content">
                                            <p class="display-number" id="countdown-seconds">
                                                {{$remainingTime['seconds'] ? $remainingTime['seconds'] : '00'}}</p>
                                            <p class="display-text">Sec</p>
                                        </div>
                                    </div>
                                </div>


                            </div>


                        </div>

                    </div>




                </div>

            </div>
            <style>
                .location {
                    border: 2px solid var(--sonic-silver);
                    margin: 10px;

                }

                iframe {
                    width: 100%;
                    height: 460px;
                }
            </style>
            <div class="location">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3634.3565095666!2d88.60230690000003!3d24.368898400000006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fbefb67632f01d%3A0xdad1b649c3230765!2sHelium!5e0!3m2!1sen!2sbd!4v1724012831681!5m2!1sen!2sbd"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <!-- Review & Rating Section -->
              



        </div>

    </div>

</div>




@endsection

@section("scripts")

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the countdown elements
        const daysElem = document.getElementById('countdown-days');
        const hoursElem = document.getElementById('countdown-hours');
        const minutesElem = document.getElementById('countdown-minutes');
        const secondsElem = document.getElementById('countdown-seconds');

        // Initial countdown values (replace with your server values)
        let remainingDays = parseInt(daysElem.textContent);
        let remainingHours = parseInt(hoursElem.textContent);
        let remainingMinutes = parseInt(minutesElem.textContent);
        let remainingSeconds = parseInt(secondsElem.textContent);

        function updateCountdown() {
            if (remainingSeconds > 0) {
                remainingSeconds--;
            } else if (remainingMinutes > 0) {
                remainingSeconds = 59;
                remainingMinutes--;
            } else if (remainingHours > 0) {
                remainingMinutes = 59;
                remainingSeconds = 59;
                remainingHours--;
            } else if (remainingDays > 0) {
                remainingHours = 23;
                remainingMinutes = 59;
                remainingSeconds = 59;
                remainingDays--;
            } else {
                // Countdown is finished
                clearInterval(countdownInterval);
            }

            // Update the DOM elements
            daysElem.textContent = String(remainingDays).padStart(2, '0');
            hoursElem.textContent = String(remainingHours).padStart(2, '0');
            minutesElem.textContent = String(remainingMinutes).padStart(2, '0');
            secondsElem.textContent = String(remainingSeconds).padStart(2, '0');
        }

        // Update the countdown every second
        const countdownInterval = setInterval(updateCountdown, 1000);
    });
</script>

@endsection