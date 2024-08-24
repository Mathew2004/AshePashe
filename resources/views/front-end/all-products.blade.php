@extends("front-end.layouts.main")

@push("title")
    All Foods - AshePashe
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

            <h2 class="title">Foods ({{$products->count()}})</h2>
            <!-- <div class="filter-box">
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
            </div> -->
            <!-- Displaying offers -->

            <div class="product-grid">
                @if ($products->count())

                    @include('front-end.components.cards')


                @else
                    <p>No Results Found :( </p>

                @endif

            </div>

            <style>
                .pagination {
                    display: flex;
                    justify-content: left;
                    padding-left: 0;
                    list-style: none;
                    border-radius: 0.25rem;
                    margin-top: 30px;
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


        </div>



    </div>

</div>




@endsection


@section("scripts")


@endsection