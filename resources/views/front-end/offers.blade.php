@extends("front-end.layouts.main")

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

        
        

        <!--
            - PRODUCT GRID
          -->

        <div class="product-main">

            <h2 class="title">Offers ({{$products->count()}})</h2>
            <div class="filter-box">
                <form id="filter-form">
                    <label for="offer-filter">Filter by offer percentage:</label>
                    <select id="offer-filter" name="offer_percent">
                        <option value="all">All</option>
                        <option value="10">10%</option>
                        <option value="20">20%</option>
                        <option value="30">30%+</option>
                        <option value="other">Other</option>
                    </select>
                </form>
            </div>
            <!-- Displaying offers -->
   
            <div class="product-grid">
                @if ($products->count())

                    @foreach ($products as $prod)

                        <div class="showcase">

                            <div class="showcase-banner">

                                <img src="{{url("/uploads/products/" . $prod->image1)}}" alt="{{$prod->name}}" style="height: 250px" width="300"
                                    class="product-img default">
                                <img src="{{url("/uploads/products/" . $prod->image2)}}" alt="{{$prod->name}}" style="height: 250px"  width="300"
                                    class="product-img hover">

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
                                    <h3 class="showcase-title" style="color:red">Ends
                                        {{ \Carbon\Carbon::parse($offer->validity)->format('F j, Y g:i A') }}</h3>
                                </a>

                                <div class="showcase-rating">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star-outline"></ion-icon>
                                    <ion-icon name="star-outline"></ion-icon>
                                </div>

                                <div class="price-box">
                                    <p class="price">Tk.{{$prod->price - ($prod->price) * ($offer->offer_percent) / 100 }}</p>
                                    <del>Tk.75.00</del>
                                </div>

                            </div>

                        </div>
                    @endforeach

                @else
                    <p>No Results Found :( </p>

                @endif

            </div>

        </div>


    </div>

</div>




@endsection


@section("scripts")
<script>
      $(document).ready(function() {
        $('#offer-filter').change(function() {
            let filterValue = $(this).val();

            $.ajax({
                url: '{{ route("offers.filter") }}', // Adjust the route as necessary
                method: 'POST',
                data: {
                    offer_percent: filterValue,
                    _token: '{{ csrf_token() }}' 
                },
                success: function(response) {
                    // $('#offers-container').html(response.html);
                    alert(response.html);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
@endsection