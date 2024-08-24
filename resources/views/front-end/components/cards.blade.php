@foreach ($products as $prod)

<div class="showcase">

    <div class="showcase-banner">

        
        <img src="{{url("/uploads/products/" . $prod->image1)}}" style="height: 150px" alt="{{$prod->name}}" width="300"
            class="product-img default">
        @if($prod->image2)
        <img src="{{url("/uploads/products/" . $prod->image2)}}" style="height: 150px"  alt="{{$prod->name}}" width="300"
            class="product-img hover">
        @else 
            <img src="{{url("/uploads/products/" . $prod->image1)}}" style="height: 150px" alt="{{$prod->name}}" width="300"
            class="product-img hover">
        @endif

        @foreach ($prod->offers as $offer)
            @if ($offer->offer_percent)
                <p class="showcase-badge">
                    {{$offer->offer_percent}}% Discount
                </p>
            @else 
            <p class="showcase-badge angle pink">{{$offer->offer_buy}}</p>
            @endif
        @endforeach




        <div class="showcase-actions">

            <a class="btn-action">
                <ion-icon name="heart-outline"></ion-icon>
            </a>

            <a class="btn-action" href="{{url('product/'.$prod->slug)}}">
                <ion-icon name="eye-outline"></ion-icon>
            </a>
<!-- 
            <button class="btn-action">
                <ion-icon name="repeat-outline"></ion-icon>
            </button>

            <button class="btn-action">
                <ion-icon name="bag-add-outline"></ion-icon>
            </button> -->

        </div>

    </div>

    <div class="showcase-content">

        <a href="/product/{{$prod->slug}}" class="showcase-category">{{$prod->name}}</a>

        <a href="/product/{{$prod->slug}}">
            <h3 class="showcase-title">{{$prod->company_id}}</h3>

        </a>

        <div class="showcase-rating">
           
            
                @if ($prod->rating)
                
                    @for ($i=1; $i<=number_format($prod->rating->avg('rating'),1); $i++)
                        <ion-icon name="star"></ion-icon>
                    @endfor
                    @for ($i=5; $i>number_format($prod->rating->avg('rating'),1); $i--)
                        <ion-icon name="star-outline"></ion-icon>
                    @endfor
                    <p>({{ number_format($prod->rating->avg('rating'),1) }})</p>
                
                @endif
            
           
           
            <!-- <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star-outline"></ion-icon>
            <ion-icon name="star-outline"></ion-icon> -->
        </div>

        <div class="price-box">
            <p class="price">Tk.{{$prod->offer ? ($prod->price - $prod->price*($prod->offer->offer_percent/100)): $prod->price }}</p>
            @if ($prod->offer)
                <del>Tk.{{$prod->price}}</del>
            @endif
            
        </div>

    </div>

</div>
@endforeach