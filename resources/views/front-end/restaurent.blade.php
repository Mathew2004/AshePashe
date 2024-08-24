@extends("front-end.layouts.main")

@push("title")
  {{$store->name}} - Ashe Pashe
@endpush
<!--
    - MAIN
  -->

@section("main-section")
<!--
      - BANNER
    -->

<div class="banner">

  <div class="container">

    <!-- <div class="slider-container has-scrollbar"> -->
    <swiper-container class="mySwiper" pagination="true" pagination-clickable="true" space-between="30" effect="fade"
      autoplay="true">
      <swiper-slide>
        <div class="slider-item">

          <img src="{{url($store->image)}}" alt="women's latest fashion sale" class="banner-img">

          <!-- <div class="banner-content">

            <p class="banner-subtitle">Trending item</p>

            <h2 class="banner-title">Women's latest fashion sale</h2>

            <p class="banner-text">
              starting at &dollar; <b>20</b>.00
            </p>

            <a href="#" class="banner-btn">Shop now</a>

          </div> -->

        </div>
      </swiper-slide>

    </swiper-container>
    <!-- </div> -->

  </div>

</div>



<!--
      - PRODUCT
    -->

<div class="product-container">

  <div class="container">


    <!--
          - SIDEBAR
        -->

    @include('front-end.layouts.sidebar')
    <!--
            - PRODUCT GRID
          -->

    <div class="product-main">

      <h2 class="title">Menu's ({{$prods->count()}})</h2>

      <div class="product-grid">

        @foreach ($prods as $prod)

      <div class="showcase">

        <div class="showcase-banner">

        <img src="{{url("/uploads/products/" . $prod->image1)}}" alt="{{$prod->name}}" width="300"
          class="product-img default">
        <img src="{{url("/uploads/products/" . $prod->image2)}}" alt="{{$prod->name}}" width="300"
          class="product-img hover">

        <p class="showcase-badge">15%</p>

        <div class="showcase-actions">

          <button class="btn-action">
          <ion-icon name="heart-outline"></ion-icon>
          </button>

          <button class="btn-action">
          <ion-icon name="eye-outline"></ion-icon>
          </button>

          <button class="btn-action">
          <ion-icon name="repeat-outline"></ion-icon>
          </button>

          <button class="btn-action">
          <ion-icon name="bag-add-outline"></ion-icon>
          </button>

        </div>

        </div>

        <div class="showcase-content">

        <a href="/product/{{$prod->slug}}" class="showcase-category">{{$prod->name}}</a>

        <a href="/product/{{$prod->slug}}">
          <h3 class="showcase-title">{{$prod->company_id}}</h3>
          <h3 class="showcase-title">Distance: {{$prod->company_id}}</h3>
        </a>

        <div class="showcase-rating">
          <ion-icon name="star"></ion-icon>
          <ion-icon name="star"></ion-icon>
          <ion-icon name="star"></ion-icon>
          <ion-icon name="star-outline"></ion-icon>
          <ion-icon name="star-outline"></ion-icon>
        </div>

        <div class="price-box">
          <p class="price">Tk.{{$prod->price}}</p>
          <del>Tk.75.00</del>
        </div>

        </div>

      </div>
    @endforeach
        <style>
          .add-product-box {
            border: 3px dotted #111;
            height: 200px;
            width: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
          }
        </style>
        <div class="add-product-box">
          <button onclick="document.getElementById('add-product-modal').style.display='block'">+</button>
        </div>



      </div>

    </div>




  </div>

</div>




@endsection


@section("scripts")

@endsection