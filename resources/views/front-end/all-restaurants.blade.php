@extends("front-end.layouts.main")

@push("title")
    All Foods - AshePashe
@endpush
<!--
    - MAIN
  -->


@section("main-section")



<!--
      - Restaurants
    -->
<div class="blog">

    <div class="container">
        <h2 class="title">Restaurants</h2>

        <div class="blog-container" style="justify-content: space-around; flex-wrap: wrap; padding: 10px">


            @foreach ($companies as $company)
                @if ($company->image)
                <div class="blog-card" style="min-width: 0%; border-radius: 15px; box-shadow: 10px 0px 15px -3px rgba(0,0,0,0.1),0px 10px 15px -3px rgba(0,0,0,0.1);">

                    <a href="{{url('restaurant/' . $company->slug)}}">
                       
                            <img src="{{url($company->image)}}" alt="{{$company->name}}" style="width: 260px; height: 150px"
                                class="blog-banner">

                        
                    </a>


                    <div class="blog-content" style="margin-left: 10px">

                        <a href="{{url('restaurant/' . $company->slug)}}" class="blog-category">{{$company->city}}</a>

                        <a href="{{url('restaurant/' . $company->slug)}}">
                            <h3 class="blog-title">{{$company->name}}</h3>
                        </a>

                        <p class="blog-meta">
                            <!-- By <cite>Mr Admin</cite> / <time datetime="2022-04-06">{{$company->created_at}}</time> -->
                        </p>

                    </div>

                </div>
                @endif

            @endforeach

        </div>

    </div>

</div>


<style>
    .pagination {
        display: flex;
        justify-content: center;
        padding-left: 0;
        list-style: none;
        border-radius: 0.25rem;
        margin: 30px 0px;
    }

    .page-item {
        margin: 0 0.25rem;
    }

    .page-link {
        position: relative;
        display: block;
        padding: 0.5rem 0.75rem;
        margin-left: -1px;
        line-height: 1.25;
        color: #007bff;
        background-color: #fff;
        border: 1px solid #dee2e6;
        border-radius: 0.25rem;
        text-decoration: none;
    }

    .page-item:first-child .page-link {
        border-top-left-radius: 0.25rem;
        border-bottom-left-radius: 0.25rem;
    }

    .page-item:last-child .page-link {
        border-top-right-radius: 0.25rem;
        border-bottom-right-radius: 0.25rem;
    }

    .page-item.active .page-link {
        z-index: 1;
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }

    .page-item.disabled .page-link {
        color: #6c757d;
        pointer-events: none;
        background-color: #fff;
        border-color: #dee2e6;
    }

    .page-link:hover {
        color: #0056b3;
        background-color: #e9ecef;
        border-color: #dee2e6;
    }
</style>
<nav aria-label="Page navigation example">
    <ul class="pagination" id="pagination-links">
        <!-- Previous Page Link -->
        @if ($products->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $products->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        @endif

        <!-- Pagination Elements -->
        @foreach ($products->links()->elements as $element)
            @if (is_string($element))
                <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $products->currentPage())
                        <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        <!-- Next Page Link -->
        @if ($products->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        @else
            <li class="page-item disabled">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        @endif
    </ul>
</nav>



@endsection


@section("scripts")


@endsection