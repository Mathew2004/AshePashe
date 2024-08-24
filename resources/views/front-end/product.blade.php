@extends("front-end.layouts.main")

@push('title')
    {{$prod->name}} - AshePashe
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

        @include("front-end.layouts.sidebar")



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
                                    @if ($prod->image1)
                                        <swiper-slide>
                                            <img src="{{url("/uploads/products/" . $prod->image1)}}" class="showcase-img" />
                                        </swiper-slide>
                                    @endif
                                    @if ($prod->image2)
                                        <swiper-slide>
                                            <img src="{{url("/uploads/products/" . $prod->image2)}}" class="showcase-img" />
                                        </swiper-slide>
                                    @endif
                                    @if ($prod->image3)
                                        <swiper-slide>
                                            <img src="{{url("/uploads/products/" . $prod->image3)}}" class="showcase-img" />
                                        </swiper-slide>
                                    @endif



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
                                    <h3 class="showcase-title">{{$prod->name}}</h3>
                                </a>

                                <p class="showcase-desc">
                                    {!! $prod->description !!}
                                </p>

                                <div class="price-box">
                                    @if ($prod->offer)
                                        <p class="price">Tk.
                                            {{$prod->price - $prod->price * ($prod->offer->offer_percent / 100)}}</p>
                                    @else
                                        <p class="price">Tk. {{$prod->price }}</p>

                                    @endif

                                    <!-- <del>$200.00</del> -->
                                </div>

                                <button class="add-cart-btn">add to Favourite</button>
                                <!-- 
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
-->
                                @if ($prod->offer)
                                    <div class="countdown-box">
                                        <p class="countdown-desc">Hurry Up! Offer ends in:</p>
                                        <div class="countdown">
                                            <div class="countdown-content">
                                                <p class="display-number" id="countdown-days">
                                                    {{$remainingTime['days'] ? $remainingTime['days'] : '00'}}
                                                </p>
                                                <p class="display-text">Days</p>
                                            </div>
                                            <div class="countdown-content">
                                                <p class="display-number" id="countdown-hours">
                                                    {{$remainingTime['hours'] ? $remainingTime['hours'] : '00'}}
                                                </p>
                                                <p class="display-text">Hours</p>
                                            </div>
                                            <div class="countdown-content">
                                                <p class="display-number" id="countdown-minutes">
                                                    {{$remainingTime['minutes'] ? $remainingTime['minutes'] : '00'}}
                                                </p>
                                                <p class="display-text">Min</p>
                                            </div>
                                            <div class="countdown-content">
                                                <p class="display-number" id="countdown-seconds">
                                                    {{$remainingTime['seconds'] ? $remainingTime['seconds'] : '00'}}
                                                </p>
                                                <p class="display-text">Sec</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif




                            </div>


                        </div>

                    </div>




                </div>

            </div>

            <!-- Iframe -->
            <style>
                .location {
                    border: 2px solid var(--sonic-silver);
                    margin: 10px;
                    display: none;
                }

                iframe {
                    width: 100%;
                    height: 460px;
                }

                @media screen and (max-width: 1000px) {
                    .location {
                        display: block;
                    }

                    iframe {
                        width: 100%;
                        height: 300px;
                    }
                }
            </style>
            <div class="location">
                <!-- <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3634.3565095666!2d88.60230690000003!3d24.368898400000006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fbefb67632f01d%3A0xdad1b649c3230765!2sHelium!5e0!3m2!1sen!2sbd!4v1724012831681!5m2!1sen!2sbd"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                <!-- ->iframe - -->
                {!!$store->iframe!!}
            </div>

            <div class="product-main">

                <h2 class="title">Similar Foods</h2>

                <div class="product-grid">

                    @include('front-end.components.cards')


                </div>


            </div>



            <!-- Review Css -->
            @include("front-end.components.review-css")

            <div class="review-section">
                <div class="rating-section">
                    <div class="user-rating">
                        <div class="stars">
                            <i>★</i><i>★</i><i>★</i><i>★</i><i style="color: #ddd;">★</i>
                        </div>
                        <div class="rating-text">
                            @if ($review = App\Models\Review::where('user_id', Auth::id())->where('product_id', $prod->id)->first())
                                {{$review->review}}
                            @else

                            @endif
                        </div>
                        <button onclick="document.getElementById('add-review-modal').style.display='block'"
                            class="update-review">
                            @if (App\Models\Review::where('user_id', Auth::id())->where('product_id', $prod->id)->first())
                                Update Review
                            @else
                                Add your review
                            @endif
                        </button>
                    </div>

                    <div class="overall-rating">
                        <div>{{number_format($averageRating, 1)}}</div>
                        <div class="star-rating">★★★★☆</div>
                        <div class="rating-count">{{$reviews->count()}} Reviews</div>
                    </div>

                    <div class="rating-distribution">
                        <div class="rating-bar">
                            <div class="star-text">★★★★★</div>
                            <!-- <div class="bar"><span style="width: 85%;"></span></div> -->
                            <div class="count">
                                {{App\Models\Review::where('product_id', $prod->id)->where('rating', 5)->count()}}
                            </div>
                        </div>
                        <div class="rating-bar">
                            <div class="star-text">★★★★☆</div>
                            <!-- <div class="bar"><span style="width: 5%;"></span></div> -->
                            <div class="count">
                                {{App\Models\Review::where('product_id', $prod->id)->where('rating', 4)->count()}}
                            </div>
                        </div>
                        <div class="rating-bar">
                            <div class="star-text">★★★☆☆</div>
                            <!-- <div class="bar"><span style="width: 5%;"></span></div> -->
                            <div class="count">
                                {{App\Models\Review::where('product_id', $prod->id)->where('rating', 3)->count()}}
                            </div>
                        </div>
                        <div class="rating-bar">
                            <div class="star-text">★★☆☆☆</div>
                            <!-- <div class="bar"><span style="width: 0%;"></span></div> -->
                            <div class="count">
                                {{App\Models\Review::where('product_id', $prod->id)->where('rating', 2)->count()}}
                            </div>
                        </div>
                        <div class="rating-bar">
                            <div class="star-text">★☆☆☆☆</div>
                            <!-- <div class="bar"><span style="width: 10%;"></span></div> -->
                            <div class="count">
                                {{App\Models\Review::where('product_id', $prod->id)->where('rating', 1)->count()}}
                            </div>
                        </div>
                    </div>
                </div>

                @foreach ($reviews as $review)

                    <div class="review">
                        <div class="review-header">
                            <img src="{{App\Models\User::where('id', $review->user_id)->first()->image}}" alt="User Image">
                            <div>
                                <div class="user-name">{{App\Models\User::where('id', $review->user_id)->first()->name}}
                                </div>
                                <div class="review-date">{{$review->created_at}}</div>
                            </div>
                            <div class="star-rating">
                                @for ($i = 1; $i <= $review->rating; $i++)
                                    <ion-icon name="star"></ion-icon>
                                @endfor
                                @for ($r = $review->rating; $r < 5; $r++)
                                    <ion-icon name="star-outline"></ion-icon>
                                @endfor


                            </div>
                        </div>
                        <div class="review-content">
                            {{$review->review}}
                        </div>
                        <div class="review-actions">
                            <button>
                                <i>👍</i> Helpful (<span class="vote-count">0</span>)
                            </button>
                            <button>
                                <i>👎</i> Not Helpful
                            </button>
                        </div>
                    </div>

                @endforeach
            </div>


        </div>

    </div>

</div>


<!-- Review Modal -->

<div id="add-review-modal" class="store-modal" style="display:none">
    @include("front-end.components.add-review-modal") 
    <!-- <h1>Hello</h1> -->
</div>


@endsection


@section('scripts')


<!-- CountDown -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
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



<script>
    $(document).ready(function () {
        $(".star").click(function () {
            var rating = $(this).data("value");
            $("#review-value").val(rating);

            $(".star").each(function () {
                if ($(this).data("value") <= rating) {
                    $(this).attr("name", "star");
                } else {
                    $(this).attr("name", "star-outline");
                }
            });
        });


        $("#review-form").submit(function (e) {
            e.preventDefault(); // Prevent the form from submitting the traditional way

            var formData = $(this).serialize();

            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: formData,
                success: function (response) {

                    if (response.update) {
                        $('#add-review-modal').attr('style', 'display:none');
                        alert("Review Updated")
                    }
                    else {

                        // Optionally, clear the form or update the page with the new review
                        // Construct the new review element
                        var newReview = `
                         <div class="review">
                            <div class="review-header">
                                <img src="${response.review.user_img}" alt="User Image">
                                <div>
                                    <div class="user-name">${response.review.user_name}</div>
                                    <div class="review-date">${new Date(response.review.created_at).toLocaleDateString()}</div>
                                </div>
                                <div class="star-rating">
                                    ${generateStars(response.review.rating)}
                                </div>
                            </div>
                            <div class="review-content">
                                ${response.review.review}
                            </div>
                            <div class="review-actions">
                                <button>
                                    <i>👍</i> Helpful (<span class="vote-count">0</span>)
                                </button>
                                <button>
                                    <i>👎</i> Not Helpful
                                </button>
                            </div>
                        </div>
                    `;
                        // alert(newReview);
                        // Append the new review to the list of reviews
                        $(".review-section").append(newReview);
                        $('#add-review-modal').attr('style', 'display:none');
                        // alert(response.message);

                        // Optionally, clear the form
                        // $('#review-form')[0].reset();
                        // $("#review-value").val(0);

                        // $(".star").attr("name", "star-outline");
                        $(".rating-text").text(response.review.review);
                        $(".update-review").text("Update Review");
                    }
                },
                error: function (response) {
                    alert('An error occurred. Please try again.');
                }
            });
        });
        function generateStars(rating) {
            var starsHtml = '';
            for (var i = 1; i <= 5; i++) {
                if (i <= rating) {
                    starsHtml += '<ion-icon name="star"></ion-icon>';
                } else {
                    starsHtml += '<ion-icon name="star-outline"></ion-icon>';
                }
            }
            return starsHtml;
        }
    });


</script>

@endsection