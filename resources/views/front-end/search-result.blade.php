@extends("front-end.layouts.main")


@push('title')
{{$query}} - Search
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

       

        <!--
            - PRODUCT GRID
          -->

        <div class="product-main">

            <h2 class="title">Search Results ({{$products->count()}})</h2>

            <div class="product-grid">
                @if ($products->count())
                
                @include('front-end.components.cards')

                @else
                    <p>No Results Found :( </p>

                @endif

            </div>

        </div>


    </div>

</div>




@endsection


@section("scripts")


@endsection