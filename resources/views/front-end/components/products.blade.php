@foreach ($products as $prod)

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